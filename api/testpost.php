<?php

header("Content-Type: application/json");
$obj = new stdClass();
$obj->message = $_POST['message'];

$json = json_encode($obj);
echo $json;