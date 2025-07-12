<?php require_once 'header.views.php'; ?>
<?php require_once 'navbar.views.php'; ?>
<?php
    if(!isset($_SESSION['user_id']) || !isset($user)) {
        Redirect('login');
    }
?>
<link rel="stylesheet" href="<?=ROOT?>/assets/css/profile.css">

<div class="profile-container">
    <div class="profile-image">
        <?php if(isset($user->image) && !empty($user->image)): ?>
            <img src="<?=ROOT?>/assets/img/people/<?= $user->image ?>" alt="User Profile">
        <?php else: ?>
        <img src="<?=ROOT?>/assets/img/people/default-avatar.jpg" alt="User Profile">
        <?php endif; ?>
    </div>

    <div class="profile-info">
        <h2><?= $user->username ?></h2>
        <p><strong>Email: </strong><?= $user->email ?></p>
        <p><strong>Phone: </strong><?= $user->phone ?></p>
        <p><strong>Address: </strong><?= $user->address ?></p>

        <div class="btns">
            <a href="<?=ROOT?>/Profile/editProfile/<?= $user->id?>" class="btn btn-update">Update Profile</a>
            <a href="" class="btn btn-password">Change Password</a>
        </div>
    </div>
</div>

<?php include "footer.views.php"; ?>