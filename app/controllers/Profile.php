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
    public function editProfile($id = null){
        if(empty($id)) {
            Redirect('profile');
        }
        $user = new User();
        $user = $user->first(['id' => $id]);
        if(empty($user) || $id != $_SESSION['user_id']) {
            Redirect('_404');
        }
        $this->view('editProfile', ['user' => $user]);
    }
    public function update($id){
        $user = new User();
        $old = $user->first(['id' => $id]);
        if(empty($old) || $id != $_SESSION['user_id']) {
            Redirect('_404');
        }
        if(isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
            if(!empty($old->image)) {
                $oldImagePath = '../public/assets/img/people/' . $old->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $newName = time() . '_' . $_FILES['profile_image']['name'];
            $destination = '../public/assets/img/people/' . $newName;
            move_uploaded_file($_FILES['profile_image']['tmp_name'], $destination);
        }
        $data = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'image' => isset($newName) ? $newName : $old->image
        ];
        $user->update($id, $data);
        Redirect('profile');
    }
    public function ChangePassword($id = null){
        if(empty($id)) {
            Redirect('profile');
        }
        $user = new User();
        $user = $user->first(['id' => $id]);
        if(empty($user) || $id != $_SESSION['user_id']) {
            Redirect('_404');
        }
        $this->view('changePassword', ['user' => $user]);
    }
    public function changed($id){
        $user = new User();
        $old = $user->first(['id' => $id]);
        if(empty($old) || $id!= $_SESSION['user_id']) {
            Redirect('_404');
        }
        if(!password_verify($_POST['current_password'], $old->password)) {
            $_SESSION['error'] = 'Current password is incorrect.';
            Redirect('Profile/ChangePassword/' . $id);
        }
        if($_POST['new_password'] !== $_POST['confirm_password']) {
            $_SESSION['error'] = 'New password and confirmation do not match.';
            Redirect('Profile/ChangePassword/' . $id);
        }
        $data = [
            'password' => password_hash($_POST['new_password'], PASSWORD_DEFAULT)
        ];
        $user->update($id, $data);
        Redirect('profile');
    }
    public function deleteImage($id){
        $user = new User();
        $old = $user->first(['id' => $id]);
        if(empty($old)){
            Redirect('_404');
        }
        if(!empty($old->image)) {
            $imagePath = '../public/assets/img/people/' . $old->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $data = ['image' => null];
            $user->update($id, $data);
        }
        Redirect('profile');
    }

    
}
