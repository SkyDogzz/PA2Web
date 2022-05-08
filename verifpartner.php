<?php

require 'dbConnection.php';

if (
    !isset($_POST['email']) || empty($_POST['email']) ||
    !isset($_POST['email2']) || empty($_POST['email2']) ||
    !isset($_POST['password']) || empty($_POST['password']) ||
    !isset($_POST['password2']) || empty($_POST['password2']) ||
    !isset($_POST['country']) || empty($_POST['country']) ||
    !isset($_POST['digit']) || empty($_POST['digit']) ||
    !isset($_POST['siren']) || empty($_POST['siren']) ||
    !isset($_POST['name']) || empty($_POST['name'])
) {
    header('location:partner.php?message=Veuillez remplir tous les champs !&type=danger');
    exit;
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header("location:partner.php?message=Votre email n'est pas dans le bon format!&type=danger");
    exit;
}

if (!filter_var($_POST['email2'], FILTER_VALIDATE_EMAIL)) {
    header("location:partner.php?message=Votre email n'est pas dans le bon format!&type=danger");
    exit;
}

if ($_POST['email'] != $_POST['email2']) {
    header("location:partner.php?message=Les emails ne sont pas identiques!&type=danger");
    exit;
}


$passwordRegex = "/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/";

if (preg_match($passwordRegex, $_POST["password"], $matches, 0, 0) == 0) {
    header('location:partner.php?message=Format du mot de passe incorrect ( Contient au moint 8 caractéres, au moins une minuscule, au moins une majuscules et au moint un caractéres spécials)&type=danger');
    exit;
}


if ($_POST['password'] != $_POST['password2']) {
    header('location:partner.php?message=Vos deux mots de passes ne sont pas identiques !&type=danger');
    exit;
}

$TVA = $_POST['country'] . $_POST['digit'] . $_POST['siren'];
echo $TVA;

$rq  = "SELECT id FROM compagnies WHERE email = '" . $_POST['email'] . "'";

$sth = $db->query($rq);

$result = $sth->fetch();

if ($result) {
    header('location:partner.php?message=L\'Email que vous venez de rentrer est déja utilisé !&type=danger');
    exit;
}

//var_dump($TVA);

$_POST["password"] = password_hash($_POST["password"], PASSWORD_BCRYPT);

$rq = "INSERT INTO compagnies (email, password, siren, TVA, name) VALUES ('" . $_POST['email'] . "', '" . $_POST['password'] . "', '" . $_POST['siren'] . "', '" . $TVA . "','" . $_POST['name'] . "')";
//var_dump($rq);

$req = $db->prepare($rq);
$reponse = $req->execute([
    'email' => $_POST['email'],
    'password' => hash('sha512', $_POST['password']),
    'siren' => $_POST['siren'],
    'TVA' => $TVA,
    'name' => $_POST['name']
]);

header('location: index.php');
exit();