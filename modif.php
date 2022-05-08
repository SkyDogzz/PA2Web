<?php

require 'dbConnection.php';

$q = 'UPDATE users SET username = "' . $_GET['username'] . '", email = "' . $_GET['email'] . '"';
$req = $db->query($q);
header('Location: clientadmin.php?id=' . $_GET['id']);
