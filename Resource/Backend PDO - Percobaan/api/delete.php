<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../utils/connect.php";
include_once "../lib/toko.php";

$database = new Database();
$dbname = $database->getConnect();

$toko = new Toko($dbname);
$toko->id = isset($_GET['id']) ? $_GET['id'] : die();

if($toko->delete()){
    $res = [
        'status' => http_response_code(200),
        'messsage' => 'Delete Success ! !'
    ];
}else {
    $res = [
        'status' => http_response_code(500),
        'messsage' => 'Internal Service Error'
    ];
}
echo json_encode($res);
