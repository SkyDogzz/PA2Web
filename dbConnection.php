<?php

$host = 'localhost';
$dbname = 'mydb';
$dbuser = 'skydogzz';
$dbpass = 'notloyaltycard';

try {
    $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $dbuser, $dbpass);
    ////var_dump only arrays
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    //var_dump($e);
}
