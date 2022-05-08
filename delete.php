<?php

require 'dbConnection.php';
$q = "DELETE FROM users WHERE id = '$_GET[id]'";
$req = $db->query($q);
header('Location: clientadmin.php');