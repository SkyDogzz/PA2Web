<?php

require 'dbConnection.php';

$q = 'UPDATE products SET name = "' . $_GET['name'] . '", price = "' . $_GET['price'] . '", description = "' . $_GET['description'] . '" WHERE id = "' . $_GET['id'] . '"';
//var_dump($q);
$req = $db->query($q);
header('Location: produitsadmin.php?id=' . $_GET['id']);
exit();
