<?php
class Logout {
    use Controller ;
    public function index(){
        session_unset();
        session_destroy();
        Redirect('login');
    }
}