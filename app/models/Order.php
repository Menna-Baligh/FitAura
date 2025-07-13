<?php
class Order{
    use Model ;
    protected $table = 'orders' ;
    protected $allowedColumns = [
        'user_id' , 
        'total' ,
        'status',
        'shopping_info_id',
        'created_at'
    ];
    
}