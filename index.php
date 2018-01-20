<?php

session_start();
require_once('generate_bill.php');
$bill = new GenerateBill();
$checkout = $bill->checkout();
$checkoutId = $checkout['id'];
$_SESSION['checkout_id'] = $checkoutId;
header("Location: payment.php");
?>


