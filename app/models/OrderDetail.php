<?php
class OrderDetail{
    use Model ;
    protected $table = 'order_details' ;
    protected $allowedColumns = [
        'order_id' , 
        'product_id' ,
        'quantity',
        'price' ,
    ];
    
}