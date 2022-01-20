<?php
    if(!empty($_GET['paymentID']) && !empty($_GET['payerID']) && !empty($_GET['token']) && !empty($_GET['pid']) ){
        $paymentID = $_GET['paymentID'];
        $payerID = $_GET['payerID'];
        $token = $_GET['token'];
        $pid = $_GET['pid'];
?>
<div class="alert alert-success">
    <strong>Success!</strong> Su pago ha sido procesado correctamente.
</div>
<table>
    <tr>
        <td>Payment Id: <?php echo $paymentID; ?></td>
        <td>Payer Id: <?php echo $payerID; ?></td>
        <td>product Id: <?php echo $pid; ?></td>
    </tr>
</table>
<?php
    }
?>