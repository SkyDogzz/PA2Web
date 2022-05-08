<?php

require 'dbConnection.php';

$q = "DELETE FROM products WHERE id = '$_GET[id]'";
$req = $db->query($q);
header('Location: produitsadmin.php');
