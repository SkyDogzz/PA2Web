<?php
session_start();

require 'dbConnection.php';

if (!isset($_POST['email']) || !isset($_POST['password'])) {
    header("Location: index.php");
    exit();
}

$email = htmlspecialchars($_POST['email']);

$rq = $db->prepare('SELECT * FROM users WHERE email = "' . $email . '"');
$rq->execute();
$user = $rq->fetch();

if(password_verify($_POST['password'], $user['password'])){
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['isadmin'] = $user['isadmin'];
    header("Location: index.php");
    exit();
}
else{
    header("Location: index.php");
    exit();
}
