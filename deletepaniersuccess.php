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
    'products_id' => $_GET['productid']
));

//recupere le prix du produit supprimé
$query = $db->prepare('SELECT price FROM products WHERE id = :id');
$query->execute(array(
    'id' => $_GET['productid']
));
$price = $query->fetch();
$price = $price['price'];
$price = floatval($price);
//div par 10 et arrondir à l'entier inférieur
$points = $price / 10;
$points = floor($points);

//ajouter les points au compte
$query = $db->prepare('UPDATE users SET fidelity_points = fidelity_points + :points WHERE id = :id');
$query->execute(array(
    'points' => $points,
    'id' => $_SESSION['id']
));

header('Location: success.php');
exit();