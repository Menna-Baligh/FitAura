<?php
// testing while martina finish authentication
$_SESSION['user_id'] = 1; // Example user ID, replace with actual logic to get user ID
// unset($_SESSION['user_id']);
class Profile {
    use Controller ;
    public function index(){
        if(!isset($_SESSION['user_id'])) {
            Redirect('login');
        }
        $user = new User();
        $user = $user->first(['id' => $_SESSION['user_id']]);
        $this->view('profile', ['user' => $user]);
    }
    
}
