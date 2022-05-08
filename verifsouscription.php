<?php
session_start();

unset($_SESSION['subscription_error']);

require 'dbConnection.php';

//tester si tout les champs sont remplis
if (!isset($_POST['username']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['password2'])) {
    $_SESSION['subscription_error'] = "Veuillez remplir tout les champs";
    header('Location: souscrire.php');
    exit();
}

//tester si password et password2 sont identiques
if ($_POST['password'] != $_POST['password2']) {
    $_SESSION['subscription_error'] = "Les mots de passe ne sont pas identiques";
    header('Location: souscrire.php');
    exit();
}

//tester si l'email est valide
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['subscription_error'] = "L'email n'est pas valide";
    header('Location: souscrire.php');
    exit();
}

//verifier si l'utilisateur existe deja
$query = $db->prepare('SELECT id FROM users WHERE email = :email');
$query->execute(array(
    'email' => $_POST['email']
));
$user = $query->fetch();
if ($user) {
    $_SESSION['subscription_error'] = "Cet email est déjà utilisé";
    header('Location: souscrire.php');
    exit();
}

//verifier si l'utilisateur existe deja
$query = $db->prepare('SELECT id FROM users WHERE username = :username');
$query->execute(array(
    'username' => $_POST['username']
));
$user = $query->fetch();
if ($user) {
    $_SESSION['subscription_error'] = "Ce nom d'utilisateur est déjà utilisé";
    header('Location: souscrire.php');
    exit();
}

//sinon creer l'utilisateur
$query = $db->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
$query->execute(array(
    'username' => $_POST['username'],
    'email' => $_POST['email'],
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
));
$_SESSION['subscription_success'] = "L'utilisateur à été crée avec succés";
header('Location: souscrire.php');
exit();
