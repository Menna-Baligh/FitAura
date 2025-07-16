<?php
class Login {
    use Controller ;
    public function index(){
        $this->view('login');
    }
    public function store(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
            $user = new User();
            $user = $user->first(['email' => $_POST['email']]);
            if($user && password_verify($_POST['password'], $user->password)){
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_name'] = $user->username;
                Redirect('index');
            }else{
                $_SESSION['error'] = 'Invalid email or password.';
                Redirect('login');
            }
        }else{
            $_SESSION['error'] = 'Invalid request';
            Redirect('login');
        }
    }
    
}
