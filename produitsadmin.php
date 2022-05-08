<?php

require 'includes/header.php';

?>
<h2>Gerer Les Produits</h2>

<div>
    <table class="table-gere">
        <tbody>
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>prix</th>
                <th>description</th>
                <th>Suppresion</th>
                <th>Modifier</th>
            </tr>

            <?php

            $q = "SELECT * FROM products ORDER BY id ASC";
            $req = $db->query($q);
            $reponse = $req->fetchAll(PDO::FETCH_ASSOC);

            foreach ($reponse as $reponse) {
                echo '<tr>';
                echo '<th>' . $reponse['id'] . '</th>';
                echo '<th>' . $reponse['name'] . '</th>';
                echo '<th>' . $reponse['price'] . '</th>';
                echo '<th>' . $reponse['description'] . '</th>';
                echo '<th><button class="admin-btn-2" onclick="confirmerdelprod(' . $reponse['id'] . ')">Supprimer</button></th>';
                echo '<th><button class="admin-btn-2" onclick="window.location.href = \'modifierproduits.php?id=' . $reponse['id'] . '\'">Modifier</button></th>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>


        <button class="admin-btn" onClick=window.location.href="admin.php">Revenir a la page admin</button>


    <?php

    require 'includes/footer.php';
