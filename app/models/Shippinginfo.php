<?php
class Shippinginfo {
    use Model ;
    protected $table = 'shipping_info' ;
    protected $allowedColumns = [
        'id',
        'user_id' ,
        'name',
        'email',
        'address',
        'city',
        'postal_code',
        'phone',
        'payment_type',
        'created_at'
    ];
    
}