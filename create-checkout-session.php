<?php
session_start();

require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51KlZdrAt7tk2lPMNCXXPFLa64xpZFCuktiNPuB9R8zS3M5ykgLKDSJEW9ZG0H36UUbqy4O2gVjsYyNdmyGyLwPcs00nJQVxn0C');

header('Content-Type: HTML');

$stripe = new \Stripe\StripeClient('sk_test_51KlZdrAt7tk2lPMNCXXPFLa64xpZFCuktiNPuB9R8zS3M5ykgLKDSJEW9ZG0H36UUbqy4O2gVjsYyNdmyGyLwPcs00nJQVxn0C');
$YOUR_DOMAIN = 'http://152.228.175.198/';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' =>
  [
    ['price' => $_POST['product'], "quantity" => $_POST['quantity']],
  ],
  'mode' => $_POST['mode'],
  'success_url' => $YOUR_DOMAIN . 'deletepaniersuccess.php?productid=' . $_POST['productid'] . '&userid=' . $_SESSION['id'],
  'cancel_url' => $YOUR_DOMAIN . 'cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);