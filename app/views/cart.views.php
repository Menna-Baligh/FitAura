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
<?php
    if(!isset($_SESSION['user_id'])){
        Redirect('login');
    }
    if(empty($cartItems)):?>
        <div class="empty-cart">
            <h2>Your cart is empty!</h2>
            <p>Looks like you haven’t added anything yet...</p>
            <a href="<?=ROOT?>" class="start-btn">Start Shopping</a>
        </div>
    
    <?php else: ?>
        <?php if(isset($_SESSION['error'])): ?>
                    <div class="error-message"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
            <section id="cart" class="section-p1">
                
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($cartItems as $item): ?>
                                <?php
                                    $product = new Product();
                                    $productDetails = $product->first(['id' => $item->product_id]);
                                ?>
                                <tr>
                                    <td><img src="../../public/assets/<?= $productDetails->image ?>" alt="product1"></td>
                                    <td><?= $productDetails->name ?></td>
                                    <td><small><?= $productDetails->description ?></small></td>
                                    <td>
                                    <form action="<?=ROOT?>/cart/updateQuantity" method="post">
                                        <input type="number" name="quantity" value="<?= $item->quantity ?>" min="1" onchange="this.form.submit()">
                                        <input type="hidden" name="product_id" value="<?= $item->product_id ?>"> <!-- ID product -->
                                    </form>
                                    </td>
                                    <td>$<?= $productDetails->price ?></td>
                                    <td>$<?= $productDetails->price * $item->quantity ?></td>
                                    <form action="<?=ROOT?>/cart/remove" method="post">
                                        <input type="hidden" name="product_id" value="<?= $item->product_id ?>"> <!-- ID product -->
                                    <td><button type="submit" name="remove" class="btn btn-danger">Remove</button></td>
                                    </form>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div style="margin-top: 20px; text-align: center;">
                        <a href="<?=ROOT?>/ConfirmOrder" class="btn btn-success">Confirm Order</a>
                        <form action="<?=ROOT?>/cart/clear" method="post" style="display:inline-block; margin-left: 10px;">
                            <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure you want to clear the cart?')">Clear Cart</button>
                        </form>
                    </div>
                    
                
            </section>
    <?php endif ; ?>



</body>
</html>

<?php include "footer.views.php" ?>
