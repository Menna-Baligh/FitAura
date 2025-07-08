<?php
include "header.php";
include "navbar.php";
?>

<link rel="stylesheet" href="css/orders.css">

<section class="orders-section">
    <h2>Your Orders</h2>

    <table class="orders-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img src="img/products/f1.jpg" alt="product"></td>
                <td>Pizza Margherita</td>
                <td>2</td>
                <td>$20.00</td>
                <td><span class="status pending">Pending</span></td>
                <td>2025-07-07</td>
            </tr>
            <tr>
                <td><img src="img/products/f2.jpg" alt="product"></td>
                <td>Chicken Shawarma</td>
                <td>1</td>
                <td>$12.00</td>
                <td><span class="status delivered">Delivered</span></td>
                <td>2025-07-06</td>
            </tr>
            <tr>
                <td><img src="img/products/f3.jpg" alt="product"></td>
                <td>Molokhia with Rice</td>
                <td>3</td>
                <td>$18.00</td>
                <td><span class="status cancelled">Cancelled</span></td>
                <td>2025-07-05</td>
            </tr>
            <!-- loop from db-->
        </tbody>
    </table>
</section>

<?php include "footer.php"; ?>
