<?php

session_start();

require 'dbConnection.php';

if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit();
}

//remove from database
$query = $db->prepare('DELETE FROM cart_has_products WHERE cart_users_id = :cart_users_id AND products_id = :products_id');
$query->execute(array(
    'cart_users_id' => $_SESSION['id'],
    'products_id' => $_GET['id']
));

header('Location: panier.php');
exit();