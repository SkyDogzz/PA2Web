<?php

require '../dbConnection.php';

$key = "notloyaltycard";

header("Content-Type: application/json");

//tester si $_GET['key'] existe et est égale à $key
if (isset($_GET['key']) && $_GET['key'] == $key) {
    $rq = $db->prepare('SELECT * FROM products');
    $rq->execute();
    $catalogue = $rq->fetchAll();
    
    //create an object name catalogueobj
    $catalogueobj = new stdClass();
    $catalogueobj->catalogue = $catalogue;
    
    //json encode the object
    
    $json = json_encode($catalogueobj);
    
    //return the json
    echo $json;
}
else {
    $status = new stdClass();
    $status->message = "Forbidden";
    $status->code = 403;
    $error= array();
    $error['status'] = $status;

    $json = json_encode($error);
    echo $json; 
}
?>