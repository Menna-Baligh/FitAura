<?php
include "header.php";
include "navbar.php";


?>

<link rel="stylesheet" href="css/profile.css">

<div class="profile-container">
    <div class="profile-image">
        <img src="img/people/default-avatar.jpg" alt="User Profile">
    </div>

    <div class="profile-info">
        <h2>UserName</h2>
        <p><strong>Email:</p>
        <p><strong>Phone:</p>
        <p><strong>Address:</p>

        <div class="btns">
            <a href="editProfile.php" class="btn btn-update">Update Profile</a>
            <a href="changePassword.php" class="btn btn-password">Change Password</a>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
