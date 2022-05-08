<?php
require '../dbConnection.php';

$key = "notloyaltycard";

header("Content-Type: application/json");

if (!isset($_GET['id'])) {
    $status = new stdClass();
    $status->message = "Bad request";
    $status->code = 400;
    $error= array();
    $error['status'] = $status;
    $json = json_encode($error);
    header("Content-Type: application/json");
    echo $json;
    exit();
}

$rq = $db->prepare('SELECT * FROM users WHERE id = "' . $_GET['id'] . '"');
$rq->execute();
$user = $rq->fetch();

if (!isset($_GET['key']) || !$_GET['key'] == $key) {
    $status = new stdClass();
    $status->message = "Forbidden";
    $status->code = 403;
    $error = array();
    $error['status'] = $status;

    $json = json_encode($error);
    header("Content-Type: application/json");
    echo $json;
} else {
    $json = json_encode($user);
    echo $json;
}
