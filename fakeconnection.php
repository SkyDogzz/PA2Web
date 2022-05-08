<?php

session_start();

//si la variable $get admin est vrai cree une fausse sesion admin
if(isset($_GET['admin'])){
    $_SESSION['isadmin'] = true;
}
else
{
    $_SESSION['isadmin'] = false;
}

if(isset($_GET['entreprise'])){
    $_SESSION['entreprise'] = true;
}
else
{
    $_SESSION['entreprise'] = false;
}

$_SESSION['username'] = "fake user";

//return to index
header("Location: index.php");
exit();