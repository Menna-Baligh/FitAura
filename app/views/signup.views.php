<?php require_once 'header.views.php'; ?>
<?php require_once 'navbar.views.php'; ?>

<link rel="stylesheet" href="../../public/assets/css/auth.css">

<div class="auth-container">
    <div class="auth-card">

        <h3 class="auth-title">Register</h3>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="UserName">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone">
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address">
            </div>

            <div class="text-center">
                <button type="submit" name="signup" class="btn-primary">Signup</button>
            </div>

            <div class="social-login">
                <button class="btn-facebook"><i class="mdi mdi-facebook"></i> Facebook</button>
                <button class="btn-google"><i class="mdi mdi-google-plus"></i> Google Plus</button>
            </div>

            <p class="sign-up">Already have an account? <a href="<?=ROOT?>/login">Login</a></p>
            <p class="terms">By creating an account, you agree to our <a href="#">Terms & Conditions</a></p>

        </form>

    </div>
</div>

<?php include "footer.views.php"; ?>
