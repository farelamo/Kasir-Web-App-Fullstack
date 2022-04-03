<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../utils/connect.php";
include_once "../lib/toko.php";

$database = new Database();
$dbname = $database->getConnect();

$toko = new Toko($dbname);
$data = json_decode(file_get_contents("php://input"));

if(!empty($data->id) && !empty($data->nama) && !empty($data->harga)){
    $toko->id = $data->id;
    $toko->name = $data->nama;
    $toko->price = $data->harga;

    if($toko->edit()){
        $res = [
            'status' => http_response_code(200),
            'messsage' => 'Update Success ! !'
        ];
    }else {
        $res = [
            'status' => http_response_code(500),
            'messsage' => 'Internal Service Error'
        ];
    }
}else {
    $res = [
        'status' => http_response_code(400),
        'messsage' => 'Data must to be filled ! !'
    ];
}

echo json_encode($res);

