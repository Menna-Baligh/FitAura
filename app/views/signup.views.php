<?php require_once 'header.views.php'; ?>
<?php require_once 'navbar.views.php'; ?>

<link rel="stylesheet" href="../../public/assets/css/auth.css">

<div class="auth-container">
    <div class="auth-card">

        <h3 class="auth-title">Register</h3>
        <?php
            if(isset($_SESSION['error'])):
                echo '<div class="error-message">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            endif;
        ?>
        <form action="<?=ROOT?>/signup/store" method="post">

            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="userName" value="<?php if(isset($_SESSION['old']['userName'])): echo $_SESSION['old']['userName']; endif; unset($_SESSION['old']['userName']);?>">
                <?php if(isset($_SESSION['errors']['userName'])): ?><p class="error-message"><?= $_SESSION['errors']['userName'] ?></p><?php endif; unset($_SESSION['errors']['userName']); ?>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php if(isset($_SESSION['old']['email'])): echo $_SESSION['old']['email']; endif; unset($_SESSION['old']['email']);?>">
                <?php if(isset($_SESSION['errors']['email'])): ?><p class="error-message"><?= $_SESSION['errors']['email'] ?></p><?php endif; unset($_SESSION['errors']['email']); ?>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
                <?php if(isset($_SESSION['errors']['password'])): ?><p class="error-message"><?= $_SESSION['errors']['password'] ?></p><?php endif; unset($_SESSION['errors']['password']); ?>
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" value="<?php if(isset($_SESSION['old']['phone'])): echo $_SESSION['old']['phone']; endif; unset($_SESSION['old']['phone']);?>">
                <?php if(isset($_SESSION['errors']['phone'])): ?><p class="error-message"><?= $_SESSION['errors']['phone'] ?></p><?php endif; unset($_SESSION['errors']['phone']); ?>
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" value="<?php if(isset($_SESSION['old']['address'])): echo $_SESSION['old']['address']; endif; unset($_SESSION['old']['address']);?>">
                <?php if(isset($_SESSION['errors']['address'])): ?><p class="error-message"><?= $_SESSION['errors']['address'] ?></p><?php endif; unset($_SESSION['errors']['address']); ?>
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
