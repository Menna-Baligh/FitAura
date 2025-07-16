<?php require_once 'header.views.php'; ?>
<?php require_once 'navbar.views.php'; ?>

<link rel="stylesheet" href="../../public/assets/css/orders.css">

<?php if (!isset($_SESSION['user_id'])) Redirect('login'); ?>

<?php if (empty($orders)): ?>
    <div class="empty-cart">
        <h2>Your orders is empty!</h2>
        <p>Looks like you haven’t ordered anything yet...</p>
        <a href="<?= ROOT ?>" class="start-btn">Start Shopping</a>
    </div>
<?php else: ?>
    <section class="orders-section">
        <h2>Your Orders</h2>

        <table class="orders-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $order): ?>
                    <tr>
                        <td>
                            <?php foreach($order->details as $item): ?>
                                <div style="margin-bottom: 10px;">
                                    <img src="<?= ROOT ?>/assets/<?= $item->product_image ?>" alt="product" style="width: 50px; height: 50px;">
                                </div>
                            <?php endforeach; ?>
                        </td>

                        <td>
                            <?php foreach($order->details as $item): ?>
                                <div style="margin-bottom: 10px;"><?= $item->product_name ?></div>
                            <?php endforeach; ?>
                        </td>

                        <td>
                            <?php foreach($order->details as $item): ?>
                                <div style="margin-bottom: 10px;"><?= $item->quantity ?></div>
                            <?php endforeach; ?>
                        </td>

                        <td>
                            <?php foreach($order->details as $item): ?>
                                <div style="margin-bottom: 10px;">$<?= $item->price ?></div>
                            <?php endforeach; ?>
                        </td>

                        <td>
                            <div style="margin-bottom: 10px;">$<?= $order->total ?></div>
                        </td>

                        <td>
                            <span class="status <?= strtolower($order->status) ?>">
                                <?= $order->status ?>
                            </span>
                        </td>

                        <td><?= date('d M Y, h:i A', strtotime($order->created_at)) ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </section>
<?php endif; ?>

<?php include "footer.views.php"; ?>
