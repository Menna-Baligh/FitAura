<?php require_once 'header.views.php'; ?>
<?php require_once 'navbar.views.php'; ?>
<?php
    if(!isset($_SESSION['user_id']) || !isset($user)) {
        Redirect('login');
    }
?>
<link rel="stylesheet" href="<?=ROOT?>/assets/css/profile.css">

<div class="profile-container">
    <h2>Edit Profile</h2>
    <form action="<?=ROOT?>/profile/update/<?= $user->id?>" method="post" class="profile-form" enctype="multipart/form-data">
        <div style="text-align: center; margin-bottom: 20px;">
            <?php if(isset($user->image) && !empty($user->image)): ?>
                <img src="<?=ROOT?>/assets/img/people/<?= $user->image ?>" alt="Profile Image" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 2px solid #ccc;">
            <?php else: ?>
            <img src="<?=ROOT?>/assets/img/people/default-avatar.jpg" alt="Profile Image" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 2px solid #ccc;">
            <?php endif; ?>
        </div>

        <label for="profile_image">Update Profile Image</label>
        <input type="file" id="profile_image" name="profile_image" accept="image/*">

        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?= $user->username ?>" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= $user->email ?>" required>

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" value="<?= $user->phone ?>" required>

        <label for="address">Address</label>
        <input type="text" id="address" name="address" value="<?= $user->address ?>" required>

        <button type="submit" class="btn btn-save">Update</button>
    </form><br>
    <a href="<?=ROOT?>/profile" class="btn btn-cancel">Cancel</a>
</div>

<?php include "footer.views.php"; ?>
