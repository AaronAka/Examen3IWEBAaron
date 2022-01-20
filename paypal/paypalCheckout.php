<div id="paypal-button-container"></div>
<div id="paypal-button"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    paypal.Button.render({
        env: '<?php echo PayPalENV; ?>',
        client: {
        <?php if(ProPayPal) { ?>
            production: '<?php echo PayPalClientId; ?>'
        <?php } else { ?>
            sandbox: '<?php echo PayPalClientId; ?>'
        <?php } ?>
        },
        payment: function (data, actions) {
            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: '<?php echo $viaje->price; ?>',
                        currency: '<?php echo $viaje->currency; ?>'
                    }
                }]
            });
        },
        onAuthorize: function (data, actions) {
            return actions.payment.execute()
                .then(function () {
                    window.location = "<?php echo PayPalBaseUrl ?>orderDetails.php?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid='<?php echo $viaje->_id; echo "-"; echo $SESSION['usuario']->_id; ?>'";
                });
        }
    }, '#paypal-button');
</script>