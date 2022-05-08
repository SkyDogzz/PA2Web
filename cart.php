<?php
session_start();
require 'dbConnection.php';

//var_dump($_POST);
//var_dump($_SESSION);

//recupere les id du cart
$rq = $db->prepare('SELECT id FROM cart WHERE users_id = "'.$_SESSION['id'].'"');
$rq->execute();
$cart = $rq->fetch();

//var_dump($cart);

//add the id of the product in the cart
$rq = $db->prepare('INSERT INTO cart_has_products (cart_id, products_id, cart_users_id, quantity) VALUES ("'.$cart['id'].'", "'.$_POST['id'].'", "'.$_SESSION['id'].'" , "1")');
//var_dump($rq);
$rq->execute();

header('Location: cartuser.php');
exit();