<?php

header("Content-Type: application/json");
$obj = new stdClass();
$obj->message = "Ratio";

$json = json_encode($obj);
echo $json;