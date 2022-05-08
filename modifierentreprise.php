<?php

require 'includes/header.php';

?>

<div>
    <h2>Modifier les infos</h2>
    <div class="modif-main">
        <div>
            <?php

            $q = 'SELECT * FROM compagnies WHERE id = ' . $_GET['id'];
            $req = $db->query($q);
            $reponse = $req->fetch(PDO::FETCH_ASSOC);

            echo '<div> id : ' . $reponse['id'] . '</div>';
            echo '<div> name : ' . $reponse['name'] . '</div>';
            echo '<div> isactive : ' . $reponse['isactive'] . '</div>';

            ?>
        </div>
        <div>
            <div>
                <label for="name">nom</label>
                <input type="text" name="name" id="name" value="<?php echo $reponse['name'] ?>">
                <input type="number" name="isactive" id="isactive" value="<?php echo $reponse['isactive'] ?>">
            </div>
            <button class="admin-btn-3" onClick="confirmermodifentr(<?php echo $_GET['id'] ?>)">Modifier</button>
            <button class="admin-btn-3" onClick="window.location.href='admin.php'">Revenir a la page admin</button>
        </div>
    </div>
</div>

<?php
require 'includes/footer.php';
