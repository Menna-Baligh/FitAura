<?php
class Orders {
    use Controller ;
    public function index(){
        if(!isset($_SESSION['user_id'])) Redirect('login');
        $orderModel = new Order();
        $orderDetailsModel = new OrderDetail();
        $productModel = new Product();

        $orders = $orderModel->where(['user_id' => $_SESSION['user_id']]);

        foreach ($orders as $order) {
            $details = $orderDetailsModel->where(['order_id' => $order->id]);
            foreach ($details as $detail) {
                $product = $productModel->first(['id' => $detail->product_id]);
                $detail->product_name = $product->name ;
                $detail->product_image = $product->image ;
                $detail->price = $detail->price ;
            }
            $order->details = $details;
        }
        $this->view('orders', ['orders' => $orders]);
    }
    
}
