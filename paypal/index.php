<?php include 'config.php'?>
<div class="container">
    <h2>Paypal Express Checkout demostracion en PHP</h2>
    <br>
    <table class="table">
        <tr>
            <td style="width:150px"><img src="demo_product.png" style="width:50px" /></td>
            <td style="width:150px">35€</td>
            <td style="width:150px">
                <?php include 'paypalCheckout.php'; ?>
            </td>
        </tr>
    </table>
</div>