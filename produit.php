<?php
require 'includes/header.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}
if(!isset($_SESSION['id'])){
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];

$rq = $db->prepare('SELECT * FROM products WHERE id = "'.$id.'"');
$rq->execute();
$produit = $rq->fetch();

if(!$produit){
    echo'<h2>Aucun produit ne correspond</h2>';
    require 'includes/footer.php';
    exit();
}

$rq = $db->prepare('SELECT name FROM compagnies WHERE id = "'.$produit['compagnies_id'].'"');
$rq->execute();
$entreprise = $rq->fetch();

echo '<div class="produit-container">';
echo '<h2>'.$produit['name'].'</h2>';
echo '<div>'.$produit['description'].'</div>';
echo '<div>'.$produit['price'].' €</div>';
echo '<div>Entreprise : '.$entreprise['name'].'</div>';
//button to add to cart
echo '<form action="cart.php" method="post">';
echo '<input type="hidden" name="id" value="'.$produit['id'].'">';
echo '<input type="hidden" name="name" value="'.$produit['name'].'">';
echo '<input type="hidden" name="price" value="'.$produit['price'].'">';
echo '<input class="admin-btn" type="submit" value="Ajouter au panier">';
echo '</div>';

require 'includes/footer.php';
?>