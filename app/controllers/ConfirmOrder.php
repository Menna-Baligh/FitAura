<?php
class ConfirmOrder {
    use Controller , Database ;

    public function index() {
        if (!isset($_SESSION['user_id'])) {
            Redirect('login');
        }
        $cart = new CartModel();
        $cartItems = $cart->where(['user_id' => $_SESSION['user_id']]);
        $items = 0;
        $subtotal = 0;
        foreach ($cartItems as $item) {
            $product = new Product();
            $productDetails = $product->first(['id' => $item->product_id]);
            if ($productDetails) {
                $items += $item->quantity;
                $subtotal += $productDetails->price * $item->quantity;
            }
        }
        $this->view('ConfirmOrder', ['items' => $items, 'subtotal' => $subtotal]);
    }

    public function checkout() {
        if (!isset($_SESSION['user_id'])) {
            redirect('login');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_SESSION['user_id'];

            try {
                // ✅ Start Transaction
                $this->beginTransaction();

                // 📨 Save shipping info
                $shippingInfoModel = new Shippinginfo();
                $shippingInfoId = $shippingInfoModel->insertAndGetId([
                    'user_id'      => $userId,
                    'name'         => $_POST['name'],
                    'email'        => $_POST['email'],
                    'address'      => $_POST['address'],
                    'city'         => $_POST['city'],
                    'postal_code'  => $_POST['postalCode'],
                    'phone'        => $_POST['phone'],
                    'payment_type' => $_POST['paymentType'],
                ]);

                // 🛒 Get cart items
                $cart = new CartModel();
                $cartItems = $cart->where(['user_id' => $userId]);

                if (empty($cartItems)) {
                    $_SESSION['error'] = "Cart is empty!";
                    redirect('cart');
                }

                $total = 0;
                $orderDetails = [];
                $productModel = new Product();

                // 🧾 Prepare order details + check stock
                foreach ($cartItems as $item) {
                    $product = $productModel->first(['id' => $item->product_id]);

                    if ($product->stock_qty < $item->quantity) {
                        $_SESSION['error'] = "Out of stock for {$product->name}";
                        $this->rollBack();
                        redirect('ConfirmOrder');
                    }

                    // ✅ Reduce stock
                    $productModel->update($item->product_id, [
                        'stock_qty' => $product->stock_qty - $item->quantity
                    ]);


                    $subtotal = $product->price * $item->quantity;
                    $total += $subtotal;

                    $orderDetails[] = [
                        'product_id' => $item->product_id,
                        'quantity'   => $item->quantity,
                        'price'      => $product->price,
                    ];
                }

                // 📦 Save order
                $orderModel = new Order();
                $orderId = $orderModel->insertAndGetId([
                    'user_id'         => $userId,
                    'total'           => $total,
                    'status'          => 'Pending',
                    'shopping_info_id'=> $shippingInfoId,
                ]);

                // 📄 Save order details
                $orderDetailsModel = new OrderDetail();
                foreach ($orderDetails as $detail) {
                    $detail['order_id'] = $orderId;
                    $orderDetailsModel->insert($detail);
                }

                // 🗑️ Clear cart
                foreach ($cartItems as $item) {
                    $cart->delete($item->id);
                }

                // ✅ Commit transaction
                $this->commit();

                Redirect('OrderSuccess');

            } catch (Exception $e) {
                // ❌ Rollback transaction on error
                $this->rollBack();
                $_SESSION['error'] = "An error occurred while processing your order. Please try again.";
                redirect('ConfirmOrder');
            }
        }
    }
}
