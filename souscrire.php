<?php
require 'includes/header.php';

// Si l'utilisateur est déjà connecté, on le redirige vers l'accueil
if (isset($_SESSION['id'])) {
    header('Location: index.php');
    exit();
}

?>

<form action="verifsouscription.php" method="post">
    <div>
        <label for="Username">Username</label>
        <input type="text" id="username" name="username">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password">
    </div>
    <div>
        <label for="password2">Confirmation du mot de passe</label>
        <input type="password" id="password2" name="password2">
    </div>
    <button type="submit">S'inscrire</button>
</form>

<?php

var_dump($_SESSION);

require 'includes/footer.php';
