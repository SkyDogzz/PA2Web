<?php

require 'includes/header.php';

?>

<div>
    <h2>Modifier les infos</h2>
    <div class="modif-main">
        <div>
            <?php

            $q = 'SELECT * FROM products WHERE id = ' . $_GET['id'];
            $req = $db->query($q);
            $reponse = $req->fetch(PDO::FETCH_ASSOC);

            echo '<div> id : ' . $reponse['id'] . '</div>';
            echo '<div> nom : ' . $reponse['name'] . '</div>';
            echo '<div> prix : ' . $reponse['price'] . '</div>';
            echo '<div> description : ' . $reponse['description'] . '</div>';
            ?>
        </div>
        <div>
            <div>
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" value="<?php echo $reponse['name'] ?>">
            </div>
            <div>
                <label for="price">Prix</label>
                <input type="number" name="price" id="price" value="<?php echo $reponse['price'] ?>">
            </div>
            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="5" cols="40"><?php echo $reponse['description'] ?></textarea>

            </div>
            <button class="admin-btn-3" onClick="confirmermodifprod(<?php echo $_GET['id'] ?>)">Modifier</button>

            <button class="admin-btn-3" onClick=window.location.href="admin.php">Revenir a la page admin</button>

        </div>
    </div>
</div>
<?php
require 'includes/footer.php';