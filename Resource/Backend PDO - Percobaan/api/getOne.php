<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../utils/connect.php";
include_once "../lib/toko.php";

$database = new Database();
$dbname = $database->getConnect();

$toko = new Toko($dbname);
$toko->id = isset($_GET['id']) ? $_GET['id'] : die();


$toko->show();

// if($data->rowCount() > 0){
    if($toko->name != null){
        $barang = [
            'nama' => $toko->name,
            'harga' => $toko->price
        ];

        $res = [
            'status' => http_response_code(200),
            'message' => 'Successfully get data ! !',
            'data' => $barang
        ];
    }else {
        $res = [
            'status' => http_response_code(204),
            'message' => 'Data has no name ! !'
        ];
    }
// }else {
//     $res = [
//         'status' => http_response_code(204),
//         'message' => 'Data is empty ! !'
//     ];
// }

echo json_encode($res);