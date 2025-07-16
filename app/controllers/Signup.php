<?php
class Signup {
    use Controller ;
    public function index(){
        $this->view('signup');
    }
    public function store(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])){
            // validarion 
            $errors = [];
            // userName 
            if(empty($_POST['userName'])){
                $errors['userName'] = 'Username is required';
            }elseif(strlen($_POST['userName']) < 3){
                $errors['userName'] = 'Username must be at least 3 characters';
            }
            // email 
            if(empty($_POST['email'])){
                $errors['email'] = 'Email is required';
            }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Invalid email format';
            }
            // password
            if(empty($_POST['password'])){
                $errors['password'] = 'Password is required';
            }elseif(strlen($_POST['password']) < 5){
                $errors['password'] = 'Password must be at least 5 characters';
            }elseif(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{5,}$/', $_POST['password'])){
                $errors['password'] = 'Password must contain at least one lowercase letter, one uppercase letter, and one number';
            }
            // phone
            if(empty($_POST['phone'])){
                $errors['phone'] = 'Phone number is required';
            }elseif(!preg_match('/^\+?[0-9]{10,15}$/' ,$_POST['phone'])){
                $errors['phone'] = 'Invalid phone number format';
            }
            // address
            if(empty($_POST['address'])){
                $errors['address'] = 'Address is required';
            }elseif(!is_string($_POST['address'])){
                $errors['address'] = 'Address must be a string';
            }
            if(!empty($errors)){
                $_SESSION['errors'] = $errors;
                $_SESSION['old'] = $_POST;
                $this->view('signup');
                exit();
            }
            // store in database
            $user = new User();
            $user_id = $user->insertandGetId([
                'username' => $_POST['userName'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'phone' => $_POST['phone'],
                'address' => $_POST['address']
            ]);
            if($user_id){
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_name'] = $_POST['userName'];
                Redirect('index');
            }else{
                $_SESSION['error'] = 'Something went wrong';
                $this->view('signup');
            }
        }else{
            Redirect('signup');
        }
    }
    
}
