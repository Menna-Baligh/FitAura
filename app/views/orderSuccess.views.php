<?php require_once 'header.views.php'; ?>
<?php require_once 'navbar.views.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Success</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Order placed successfully!',
            text: 'Thank you for your purchase.',
            confirmButtonText: 'Back to Home'
        }).then(() => {
            window.location.href = "<?= ROOT ?>";
        });
    </script>
</body>
</html>
<?php require_once 'footer.views.php'; ?>
