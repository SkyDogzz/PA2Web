<?php
require 'includes/header.php';
//si il n'y a pas de session
if (!isset($_SESSION['username'])) {
    //on le redirige vers la page de connexion
    header('Location: index.php');
}

//get the cart id
$rq = $db->prepare('SELECT id FROM cart WHERE users_id = "' . $_SESSION['id'] . '"');
$rq->execute();
$cart = $rq->fetch();

//recuperer les produits dans le cart
$rq = $db->prepare('SELECT products_id FROM cart_has_products WHERE cart_id = "' . $cart['id'] . '"');
$rq->execute();
$produits = $rq->fetchAll();

?>
<div>
    <?php
    if (count($produits) == 1)
        echo '<form action="create-checkout-session.php" method="post">';
    elseif (count($produits) == 0)
        echo '<h3>Vous n\'avez aucun produit dans le panier</h3>';
    else
        echo '<form action="create-checkout-session-mul.php" method="post">';
    ?>
    <h2>Panier</h2>
    <table class="table-gere">
        <tbody>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Description</th>
                <th></th>
            </tr>
            <?php

            foreach ($produits as $key => $produit) {
                $rq = $db->prepare('SELECT * FROM products WHERE id = "' . $produit['products_id'] . '"');
                $rq->execute();
                $product = $rq->fetch();
            ?>
            <tr>
                <td><?= $product['name'] ?></td>
                <td><?= $product['price'] . " €" ?></td>
                <td><?= $product['description'] ?></td>
                <td>
                    <div class="admin-btn-2 suppr-article" data-id="<?= $produit['products_id'] ?>">Supprimer</div>
                </td>
                <input type="hidden" name="productid" value="<?= $product['id'] ?>">
                <input type="hidden" name="product" value="<?= $product['productID'] ?>">
                <input type="hidden" name="mode" value="<?= $product['subscription'] ?>">
                <input type="hidden" name="quantity" value="1">
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <input class="admin-btn" type="submit" value="Payer">
    </form>
</div>
<?php

//add button to pay
echo '</div>';

require 'includes/footer.php';