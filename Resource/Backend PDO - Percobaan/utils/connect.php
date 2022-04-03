<?php

class Database {

    private $koneksi;

    public function __construct(){
        $host = "localhost";
        $dbname = "uts_sem4";
        $user = "root";
        $pass = "";
        $opts = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
        $conn = "mysql:host=$host;charset=utf8;dbname=$dbname;";
        try{
            $this->koneksi = new PDO($conn, $user, $pass, $opts);
        }catch(PDOException $e){
            echo "Koneksi gagal bro.. " . $e->getMessage();
        }
    }

    public function getConnect(){
        return $this->koneksi;
    }
}
