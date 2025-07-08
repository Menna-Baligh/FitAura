
<?php require_once 'header.views.php'; ?>
<?php require_once 'navbar.views.php'; ?>


<link rel="stylesheet" href="../../public/assets/css/login.css">

<div class="login-container">
    <div class="login-card">
        <h3 class="login-title">Login</h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password *</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-options">
                <div class="form-check">
                    <input type="checkbox" id="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Remember me</label>
                </div>
                <a href="" class="forgot-pass">Forgot password?</a>
            </div>

            <button type="submit" name="login" class="btn-login">Login</button>

            <div class="social-login">
                <button class="btn-social facebook">Facebook</button>
                <button class="btn-social google">Google+</button>
            </div>

            <p class="signup-text">Don't have an account? <a href="<?=ROOT?>/signup">Sign Up</a></p>
        </form>
    </div>
</div>

<?php include "footer.views.php"; ?>
