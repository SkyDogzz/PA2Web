<?php
require 'dbConnection.php';

//var_dump($_POST);

//create a file to store $_POST['curl']
$file = fopen('curl2.yaml', 'w');
fwrite($file, $_POST['curl']);
fclose($file);

//change chmod to 777
chmod('curl.txt', 0777);