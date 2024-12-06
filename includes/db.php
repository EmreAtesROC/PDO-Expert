<?php

class Database {

    public $pdo;

    public function __construct($host = "localhost", $db = 'registerexpert', $user = 'root', $pass = '') {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        } catch(PDOException $e) {
            echo $e;
        }
    }

    public function run($sql, $placeholders = null) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($placeholders);
        return $stmt;
    }

}
$db = new Database();
?>

