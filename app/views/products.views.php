<?php require_once 'header.views.php'; ?>
<?php require_once 'navbar.views.php'; ?>



    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Modren Desgin</p>
        <div class="pro-container">
        
                <?php if(!empty($products)): ?>
                    <?php foreach($products as $product): ?>
                        <div class="pro">
                            <a href="<?=ROOT?>/productDetails/<?=$product->id?>"><img src="../../public/assets/<?=$product->image?>" alt=""></a>
                                <div class="des">
                                <h5><?=$product->type?></h5>
                                    <h3><?=$product->name?></h3>
                                    <div class="star ">
                                        <i class="fas fa-star "></i>
                                        <i class="fas fa-star "></i>
                                        <i class="fas fa-star "></i>
                                        <i class="fas fa-star "></i>
                                        <i class="fas fa-star "></i>
                                    </div>
                                    <h4>$<?=$product->price?></h4>
                                    <?php if($product->stock_qty < 1) : ?>
                                    <button class="cart" disabled><i class="fas fa-shopping-cart" style="color: gray; font-size: 18px;"></i></button>
                                    <?php else: ?>
                                        <a href="<?=ROOT?>/cart/add/<?=$product->id?>" class="cart"><i class="fas fa-shopping-cart"></i></a>
                                    <?php endif; ?>
                                    
                                </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif ; ?>
            
        </div>
            
    </section>
    


    

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext ">
            <h4>Sign Up For Newletters</h4>
            <p>Get E-mail Updates about our latest shop and <span class="text-warning ">Special Offers.</span></p>
        </div>
        <div class="form ">
            <input type="text " placeholder="Enter Your E-mail... ">
            <button class="normal ">Sign Up</button>
        </div>
    </section>


    <?php include 'footer.views.php' ?>