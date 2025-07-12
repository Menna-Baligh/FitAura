<?php
class User{
    use Model ;
    protected $table = 'users' ;
    protected $allowedColumns = [
        'username' , 
        'email' ,
        'password',
        'phone' ,
        'address',
        'image'
    ];
    
}