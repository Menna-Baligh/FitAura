<?php
class Cart {
    use Controller ;
    public function index(){
        if(!isset($_SESSION['user_id'])){
            redirect('login');
        }
        $cart = new CartModel();
        $cartItems = $cart->where(['user_id' => $_SESSION['user_id']]);
        $this->view('cart', ['cartItems' => $cartItems]);
    }
    public function add($id = null)
        {
            if (!isset($_SESSION['user_id'])) Redirect('login');

            if (!$id) Redirect('_404');

            $product = new Product(); 
            $product = $product->first(['id' => $id]);
            if(!$product) Redirect('_404');

            $cart= new CartModel(); 

            $is_found = $cart->first([
                'user_id' => $_SESSION['user_id'],
                'product_id' => $id
            ]);

            if ($is_found && $is_found->quantity+1 <= $product->stock_qty) {
                $cart->update($is_found->id, [
                    'quantity' => $is_found->quantity + 1
                ]);
            } else {
                $cart->insert([
                    'user_id' => $_SESSION['user_id'],
                    'product_id' => $id,
                    'quantity' => 1
                ]);
            }

            redirect('cart');
    }
    public function remove()
    {
        if (!isset($_SESSION['user_id'])) Redirect('login');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'] ?? null;

            $product = new Product();
            $product = $product->first(['id' => $productId]);
            if (!$product) Redirect('_404');

            if ($productId) {
                $cart = new CartModel();
                $is_found = $cart->first([
                'user_id' => $_SESSION['user_id'],
                'product_id' => $productId
                ]);
                if ($is_found) {
                    $cart->delete($is_found->id);
                    
                }
            }
        }
        redirect('cart');
    }
    public function updateQuantity(){
    
        if (!isset($_SESSION['user_id'])) Redirect('login');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'] ?? null;
            $quantity = $_POST['quantity'] ?? 1;

            $product = new Product();
            $product = $product->first(['id' => $productId]);
            if (!$product) Redirect('_404');

            if ($product && $quantity <= $product->stock_qty) {
                $cart = new CartModel();
                $item = $cart->first([
                    'user_id' => $_SESSION['user_id'],
                    'product_id' => $productId
                ]);

                if ($item) {
                    $cart->update($item->id, ['quantity' => $quantity]);
                }
            }else{
                $_SESSION['error'] = "Only {$product->stock_qty} {$product->name} available in stock.";
            }
        }

        redirect('cart');

    }
    public function clear()
    {
        if (!isset($_SESSION['user_id'])) {
            Redirect('login');
        }

        $cart = new CartModel();
        $userId = $_SESSION['user_id'];
        $cartItems = $cart->where(['user_id' => $userId]);

        if ($cartItems) {
            foreach ($cartItems as $item) {
                $cart->delete($item->id);
            }
        }

        redirect('cart');
    }


}
