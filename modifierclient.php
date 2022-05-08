<?php

require 'includes/header.php';

?>
<div>
    <h2>Modifier les infos</h2>
    <div class="modif-main">
        <div>
            <?php

            $q = 'SELECT * FROM users WHERE id = ' . $_GET['id'];
            $req = $db->query($q);
            $reponse = $req->fetch(PDO::FETCH_ASSOC);
            echo '<div> id : ' . $reponse['id'] . '</div>';
            echo '<div> nom : ' . $reponse['username'] . '</div>';
            echo '<div> email : ' . $reponse['email'] . '</div>';
            ?>

        </div>

        <div>
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?php echo $reponse['username'] ?>">
            </div>
            <div>
                <label for="email-change">Email</label>
                <input type="text" name="email-change" id="email-change" value="<?php echo $reponse['email'] ?>">
            </div>
            <button class="admin-btn-3" onClick="confirmermodifclient(<?php echo $_GET['id'] ?>)">Modifier</button>

            <button class="admin-btn-3" onClick='window.location.href="admin.php"'>Revenir a la page admin</button>

        </div>
    </div>
</div>
<?php
require 'includes/footer.php';
