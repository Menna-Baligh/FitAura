<?php require_once 'header.views.php'; ?>
<?php require_once 'navbar.views.php'; ?>

<link rel="stylesheet" href="../../public/assets/css/product-details.css">

<?php
    if(!empty($product)) {?>
        <section class="product-details">
            <div class="product-image">
                <img src="../../public/assets/<?=$product->image?>" alt="Product Image">
            </div>

            <div class="product-info">
                <h2><?=$product->name?></h2>
                <div class="rating">
                    <span>★ ★ ★ ★ ☆</span>
                </div>
                <p class="price">$<?=$product->price?></p>
                <p class="description">
                    <?=$product->description?>
                </p>
                <?php if($product->stock_qty < 1) : ?>
                    <button class="btn-add" style="background-color: gray;" disabled>Out of Stock</button>
                <?php else:  ?>
                <form action="<?=ROOT?>/cart/add/<?=$product->id?>" method="post">
                    <button type="submit" class="btn-add">Add to Cart</button>
                </form>
                <?php endif; ?>
            </div>

        </section>
    <?php  }
?>

<?php include "footer.views.php"; ?>
