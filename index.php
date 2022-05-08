<?php require 'includes/header.php'; ?>

<?php

$rq = $db->prepare('SELECT * FROM products');
$rq->execute();
$catalogue = $rq->fetchAll();

foreach ($catalogue as $produit) {
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

?>

<?php require 'includes/footer.php'; ?>