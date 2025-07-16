<?php
class Index {
    use Controller ;
    public function index(){
        $product = new Product();
        $product->limit = 8 ; 
        $featured = $product->selectAll();
        $product->offset = 8 ;
        $newArrivals = $product->selectAll();
        $this->view('index',['featured' => $featured, 'newArrivals' => $newArrivals]);
    }
    
}
