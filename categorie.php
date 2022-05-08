<?php
require 'includes/header.php';

//recupere les id des categories
$rq = $db->prepare('SELECT id FROM categories WHERE name = "'.$_GET['name'].'"');
$rq->execute();
$id = $rq->fetch();
if ($id == false) {
    echo 'cette categories n\'existe pas';
    require 'includes/footer.php';
    exit();
}

//recupere les id des produits de la categorie
$rq = $db->prepare('SELECT products_id FROM products_has_categories WHERE categories_id = "'.$id['id'].'"');
$rq->execute();
$produits_has_categories = $rq->fetchAll();
if ($produits_has_categories == false) {
    echo '<h2>Aucun produit dans cette categorie</h2>';
    require 'includes/footer.php';
    exit();
}

foreach ($produits_has_categories as $produit) {
    $rq = $db->prepare('SELECT * FROM products WHERE id = "'.$produit['products_id'].'"');
    $rq->execute();
    $produit = $rq->fetch(); 
    ?>
    <div class="container">
    <a href="produit.php?id=<?php echo $produit['id'] ?>"><div class="img" style="background: <?php echo(sprintf('#%06X', mt_rand(0, 0xffffff))); ?>"></div></a>
        <div class="info">
            <h3><?php echo $produit['name']; ?></h3>
            <p><?php echo $produit['description']; ?></p>
            <p><?php echo $produit['price']; ?> €</p>
        </div>
    </div>
    <?php
}


require 'includes/footer.php';
?>