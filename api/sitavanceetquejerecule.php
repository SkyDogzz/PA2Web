<?php
header('Content-Type: application/json');

$a = new stdClass();
$a->ratio = "Comment veut-tu que je t'encule ?";

$json = json_encode($a);

echo $json;