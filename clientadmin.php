<?php
require 'includes/header.php';
?>
<h2>Gerer Les clients</h2>
<div>
    <table class="table-gere">
        <tbody>
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>email</th>
                <th>Suppresion</th>
                <th>Modifier</th>
            </tr>

            <?php

            $q = "SELECT * FROM users ORDER BY id ASC";
            $req = $db->query($q);
            $reponse = $req->fetchAll();

            foreach ($reponse as $reponse) {
                echo '<tr>';
                echo '<th>' . $reponse['id'] . '</th>';
                echo '<th>' . $reponse['username'] . '</th>';
                echo '<th>' . $reponse['email'] . '</th>';
                echo '<th><button class="admin-btn-2" onclick="confirmer(' . $reponse['id'] . ')">Supprimer</button></th>';
                echo '<th><button class="admin-btn-2" onclick="window.location.href = \'modifierclient.php?id=' . $reponse['id'] . '\'">Modifier</button></th>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <button class="admin-btn" onClick="window.location.href='admin.php'">Revenir a la page admin</button>
</div>
<?php
require 'includes/footer.php';
