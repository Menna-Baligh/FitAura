<?php require_once 'header.views.php'; ?>
<?php require_once 'navbar.views.php'; ?>

<link rel="stylesheet" href="../../public/assets/css/product-details.css">

<section class="product-details">

    <div class="product-image">
        <img src="../../public/assets/img/products/f1.jpg" alt="Product Image">
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

        <form action="" method="post">
            <input type="hidden" name="product_id" value="123">
            <input type="number" name="quantity" value="1" min="1" style="width: 60px; padding: 5px;">
            <button type="submit" class="btn-add">Add to Cart</button>
        </form>
    </div>

</section>

<?php include "footer.views.php"; ?>
