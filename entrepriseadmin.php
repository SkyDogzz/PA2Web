<?php
require 'includes/header.php';
?>
<h2>Gerer Les Entreprises</h2>
<div>
    <table class="table-gere">
        <tbody>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Verifier</th>
                <th>Suppresion</th>
                <th>Modifier</th>
            </tr>

            <?php

            $q = "SELECT * FROM compagnies ORDER BY id ASC";
            $req = $db->query($q);
            $reponse = $req->fetchAll(PDO::FETCH_ASSOC);

            foreach ($reponse as $reponse) {
                echo '<tr>';
                echo '<th>' . $reponse['id'] . '</th>';
                echo '<th>' . $reponse['name'] . '</th>';
                echo '<th>' . $reponse['isactive'] . '</th>';
                echo '<th><button  class="admin-btn-2" onclick="confirmerdelentr(' . $reponse['id'] . ')">Supprimer</button></th>';
                echo '<th><button  class="admin-btn-2" onclick="window.location.href = \'modifierentreprise.php?id=' . $reponse['id'] . '\'">Modifier</button></th>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <button class="admin-btn" onClick="window.location.href='admin.php'">Revenir a la page admin</button>
</div>
<?php
require 'includes/footer.php';