<?php

require 'dbConnection.php';

$rq = "UPDATE `compagnies` SET `name` = '".$_GET["name"]."', `isactive` = '".$_GET['isactive']."' WHERE `compagnies`.`id` = ".$_GET['id'];
$req = $db->query($rq);

header('Location: entrepriseadmin.php?id=' . $_GET['id']);
