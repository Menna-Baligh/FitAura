<?php require_once 'header.views.php'; ?>
<?php require_once 'navbar.views.php'; ?>
<link rel="stylesheet" href="<?=ROOT?>/assets/css/profile.css">

<div class="profile-container">
    <h2>Change Password</h2>
    <?php if(isset($_SESSION['error'])): ?>
            <div class="error-message"><?= $_SESSION['error'] ?></div>
            <?php unset($_SESSION['error']); endif; ?>
    <form action="<?=ROOT?>/Profile/changed/<?= $user->id?>" method="post" class="profile-form">
        <label for="current">Current Password</label>
        <input type="password" id="current" name="current_password" required>
        
        <label for="new">New Password</label>
        <input type="password" id="new" name="new_password" required>

        <label for="confirm">Confirm New Password</label>
        <input type="password" id="confirm" name="confirm_password" required>

        <button type="submit" class="btn btn-password">Change Password</button>
    </form><br>
    <a href="<?=ROOT?>/profile" class="btn btn-cancel">Cancel</a>
</div>

<?php include "footer.views.php"; ?>
