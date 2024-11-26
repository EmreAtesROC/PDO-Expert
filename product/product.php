<?php

require 'C:\xampp\htdocs\pdo-expert\includes\db.php';

Class Product {

    private $pdo;

    public function __construct() {
        $this->pdo = new Database;
    }

    public function insertProduct($productNaam, $prijs, $foto) {
        return $this->pdo->run("INSERT INTO product (productNaam, prijs, foto) VALUES (:productNaam, :prijs, :foto)",["productNaam" => $productNaam,"prijs" => $prijs, "foto" => $foto]);
    }

    public function selectProduct() {
        return $this->pdo->run("SELECT * FROM product")->fetchAll();
    }

    public function editProduct($productNaam, $prijs, $foto, $productCode) {
        return $this->pdo->run("UPDATE product SET productNaam = :productNaam, prijs = :prijs, foto = :foto WHERE productCode = :productCode",["productNaam"=>$productNaam,"prijs"=>$prijs, "foto" => $foto, "productCode"=>$productCode]);
    }
}
?>
