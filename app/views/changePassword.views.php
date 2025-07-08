<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<link rel="stylesheet" href="css/profile.css">

<div class="profile-container">
    <h2>Change Password</h2>
    <form action="update_password.php" method="post" class="profile-form">
        <label for="current">Current Password</label>
        <input type="password" id="current" name="current_password" required>

        <label for="new">New Password</label>
        <input type="password" id="new" name="new_password" required>

        <label for="confirm">Confirm New Password</label>
        <input type="password" id="confirm" name="confirm_password" required>

        <button type="submit" class="btn btn-password">Change Password</button>
    </form><br>
    <a href="profile.php" class="btn btn-cancel">Cancel</a>
</div>

<?php include "footer.php"; ?>
