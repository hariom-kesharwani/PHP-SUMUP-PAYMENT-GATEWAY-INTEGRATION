<?php
session_start();
if (!isset($_SESSION['checkout_id'])) {
    header("Location: index.php");
}
$checkoutId = $_SESSION['checkout_id'];
unset($_SESSION['checkout_id']);
?>
<?php if ($checkoutId): ?>
    <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
            <style type="text/css">
                .form-container .collapse {
                    display: block;
                }
            </style>
        </head>
        <body>

            <p style="font-size: 0.8em; margin: 20px auto 20px auto;text-align: center;color:#B1B3B6;padding-bottom: 25px;padding-top: 20px;">
                Please can you enter your card details below to effect payment
            </p>
            <div style="width:352px; margin:auto;">
                <card></card>
            </div>
            <script src="https://gateway.sumup.com/gateway/card.js"></script>
            <script>
                //render the form ui providing a configuration object
                PaymentCard.mount({checkoutId: "<?= $checkoutId ?>"});
                //listen to checkout processing result and handle it
                PaymentCard.on('checkout:paymentResult', function (data) {


                })
            </script>
        </body>
    </html>
<?php endif; ?>
