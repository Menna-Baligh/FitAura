<?php
include "header.php";
include "navbar.php";
?>

<link rel="stylesheet" href="css/product-details.css">

<section class="product-details">

    <div class="product-image">
        <img src="admin/imgs/f1.png" alt="Product Image">
    </div>

    <div class="product-info">
        <h2>Pizza Margherita</h2>
        <div class="rating">
            <span>★ ★ ★ ★ ☆</span>
        </div>
        <p class="price">$10.00</p>
        <p class="description">
            Classic Italian pizza made with tomato sauce, mozzarella, and fresh basil leaves. A favorite for all pizza lovers.
        </p>

        <form action="add_to_cart.php" method="post">
            <input type="hidden" name="product_id" value="123">
            <input type="number" name="quantity" value="1" min="1" style="width: 60px; padding: 5px;">
            <button type="submit" class="btn-add">Add to Cart</button>
        </form>
    </div>

</section>

<?php include "footer.php"; ?>
