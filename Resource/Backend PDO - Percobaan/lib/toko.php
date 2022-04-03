<?php

class Toko {

    public $id;
    public $name;
    public $price;

    private $db;
    private $table = "barang";

    public function __construct($dbname){
        $this->db = $dbname;
    }

    // Get all data
    function index(){
        $data = $this->db->prepare("SELECT * FROM " . $this->table);
        $data->execute();
        return $data;
    }

    // Get data by Id
    function show(){
        $data = $this->db->prepare(
            "SELECT * FROM " . $this->table . " WHERE id = ?"
        );
        $data->bindParam(1, $this->id);
        $data->execute();

        //make an object
        $row = $data->fetch(PDO::FETCH_ASSOC);

        // insert values in object
        $this->name = $row['nama'];
        $this->price = $row['harga'];
    }

    // Add data
    function create(){
        $data = $this->db->prepare(
            "INSERT INTO " . $this->table
            . "SET nama = :name, harga = :price"
        );
        $data->bindParam('nama', $this->name);
        $data->bindParam('harga', $this->price);

        return $data->execute() ? true : false;
    }

    // Edit data by Id
    function edit(){
        $data = $this->db->prepare(
            "UPDATE " . $this->table . "SET " .
            "nama = :name, harga = :price WHERE " .
            "id = :id"
        );
        $data->bindParam('id', $this->id);
        $data->bindParam('nama', $this->name);
        $data->bindParam('harga', $this->price);

        return $data->execute() ? true : false;
    }

    // Delete data by Id
    function delete(){
        $data = $this->db->prepare("DELETE FROM " . $this->tabel . " WHERE id = ?");
        $data->bindParam(1, $this->id);
        return $data->execute() ? true : false;
    }
}
    