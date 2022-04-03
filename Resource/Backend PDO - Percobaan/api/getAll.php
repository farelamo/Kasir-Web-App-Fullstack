<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../utils/connect.php";
include_once "../lib/toko.php";

$database = new Database();
$dbname = $database->getConnect();

$toko = new Toko($dbname);
$data = $toko->index();

if($data->rowCount() > 0){
    while($row = $data->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $barang[] = [
            'id' => $id,
            'nama' => $nama,
            'barang' => $harga
        ];
    }

    $res = [
        'status' => http_response_code(200),
        'message' => 'Successfully get data ! !',
        'data' => $barang
    ];
}else {
    $res = [
        'status' => http_response_code(204),
        'message' => 'Data is empty ! !'
    ]; 
}

echo json_encode($res);