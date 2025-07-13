<?php
class CartModel{
    use Model ;
    protected $table = 'cart' ;
    protected $allowedColumns = [
        'user_id' ,
        'product_id',
        'quantity'
    ];
    
}