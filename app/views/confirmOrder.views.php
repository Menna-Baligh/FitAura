<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<link rel="stylesheet" href="css/confirm.css">

<div class="checkout-container">
    
    <!-- Checkout Form -->
    <form action="checkout_process.php" method="POST" class="checkout-form">
        <h2>Checkout</h2>

        <div class="form-row">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="postalCode">Postal Code</label>
                <input type="number" name="postalCode" id="postalCode" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" required>
            </div>
        </div>

        <div class="form-row single">
            <div class="form-group full-width">
                <label for="paymentType">Payment Type</label>
                <select name="paymentType" id="paymentType" required>
                    <option value="Cash_on_Delivery">Cash on Delivery</option>
                    <option value="Credit_Card">Credit Card</option>
                    <option value="Fawry">Fawry</option>
                </select>
            </div>
        </div>

        <button class="btn-checkout" type="submit" name="checkout">Proceed to Checkout</button>
    </form>

    <!-- Order Summary -->
    <div class="order-summary">
        <h2>Order Summary</h2>
        <table>
            <tr>
                <td>Items</td>
                <td>3</td>
            </tr>
            <tr>
                <td>Subtotal</td>
                <td>$60.00</td>
            </tr>
            <tr>
                <td>Discount</td>
                <td>-$5.00</td>
            </tr>
            <tr>
                <td>Shipping</td>
                <td>$0.00</td>
            </tr>
            <tr class="total-row">
                <td><strong>Total</strong></td>
                <td><strong>$55.00</strong></td>
            </tr>
        </table>
    </div>

</div>

<?php include "footer.php"; ?>
