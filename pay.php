<?php
/*
Description: API Braintree Payment.
Author: Ziad Tamim
Version: 1.0
Author URI: https://intensifystudio.com
*/

require 'vendor/autoload.php';

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('7vgj8zmnsqpdn83m');
Braintree_Configuration::publicKey('4hxmjmdn97bh8bnn');
Braintree_Configuration::privateKey('5f24bfc5f41e6b454117b03a05f25b16');

// Get the credit card details submitted by the form
$paymentMethodNonce =  $_POST['payment_method_nonce'];
$amount = $_POST['amount'];

$result = Braintree_Transaction::sale([
  'amount' => $amount,
  'paymentMethodNonce' => $paymentMethodNonce,
  'options' => [
    'submitForSettlement' => True
  ]
]);

echo json_encode($result);
?>
