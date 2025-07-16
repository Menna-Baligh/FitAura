<?php
class Products {
    use Controller ;
    public function index(){
        $product = new Product();
        $product->limit = 12 ;
        $product->offset = 0 ;
        $products = $product->selectAll();
        $this->view('products' ,[
            'products' => $products
        ]);
    }
    
}
