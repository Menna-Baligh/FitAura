<?php
class ProductDetails {
    use Controller ;
    public function index($id){
        $product = new Product();
        $product = $product->first(['id' => $id]);
        if(!$product) Redirect('_404');
        $this->view('productDetails' ,['product' => $product]);
    }
    
}
