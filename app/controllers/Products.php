<?php
class Products {
    use Controller ;
    public function index(){
        $this->view('products/products');
    }
}
