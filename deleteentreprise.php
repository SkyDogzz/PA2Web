<?php

require 'dbConnection.php';

$q = "DELETE FROM compagnies WHERE id = '$_GET[id]'";
$req = $db->query($q);
header('Location: entrepriseadmin.php');
exit();