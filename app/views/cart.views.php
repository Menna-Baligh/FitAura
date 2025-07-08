<?php require_once 'header.views.php'; ?>
<?php require_once 'navbar.views.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart Page</title>
    <link rel="stylesheet" href="../../public/assets/css/cart.css">
</head>
<body>

<section id="page-header" class="about-header"> 
    <h2>#Cart</h2>
    <p>Let's see what you have.</p>
</section>

<section id="cart" class="section-p1">
    <form action="update_cart.php" method="post">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Desc</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    <th>Remove</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="../../public/assets/img/products/f1.jpg" alt="product1"></td>
                    <td>Product Name</td>
                    <td>Product Description</td>
                    <td>
                        <input type="number" name="quantity[]" value="1" min="1">
                        <input type="hidden" name="product_id[]" value="123"> <!-- ID product -->
                    </td>
                    <td>$10.00</td>
                    <td>$10.00</td>
                    <td><button type="submit" name="remove[]" value="123" class="btn btn-danger">Remove</button></td>
                    <td><button type="submit" name="edit[]" value="123" class="btn btn-primary">Edit</button></td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>

        <div style="margin-top: 20px; text-align: center;">
            <a href="<?=ROOT?>/ConfirmOrder" class="btn btn-success">Confirm Order</a>
        </div>
    </form>
</section>

</body>
</html>

<?php include "footer.views.php" ?>
