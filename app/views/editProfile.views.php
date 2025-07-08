<?php require_once 'header.views.php'; ?>
<?php require_once 'navbar.views.php'; ?>
<link rel="stylesheet" href="../../public/assets/css/profile.css">

<div class="profile-container">
    <h2>Edit Profile</h2>
    <form action="" method="post" class="profile-form" enctype="multipart/form-data">
        <!-- Show Current Profile Image -->
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="../../public/assets/img/people/default-avatar.jpg" alt="Profile Image" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 2px solid #ccc;">
        </div>

        <!-- Upload New Image -->
        <label for="profile_image">Update Profile Image</label>
        <input type="file" id="profile_image" name="profile_image" accept="image/*">

        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="Manona" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="manona@example.com" required>

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" value="01001234567" required>

        <label for="address">Address</label>
        <input type="text" id="address" name="address" value="Cairo, Egypt" required>

        <button type="submit" class="btn btn-save">Update</button>
    </form><br>
    <a href="<?=ROOT?>/profile" class="btn btn-cancel">Cancel</a>
</div>

<?php include "footer.views.php"; ?>
