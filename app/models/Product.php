<?php
class Product{
    use Model ;
    protected $table = 'products' ;
    protected $allowedColumns = [
        'name', 
        'description',
        'price',
        'image',
        'stock_qty',
        'type',
        'created_at'
    ];
    
}