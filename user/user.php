<?php

require 'C:\xampp\htdocs\pdo-expert\includes\db.php';

Class User {

    private $pdo;

    public function __construct() {
        $this->pdo = new Database();
    }

    public function registerUser($user, $email, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $this->pdo->run("INSERT INTO users (user, email, password) VALUES (:user, :email, :password)", ["user"=>$user, "email"=>$email, "password"=>$hash]);
    }

    public function loginUser($email) {
        return $this->pdo->run("SELECT * FROM users WHERE email = :email", ["email"=>$email])->fetch();
    }
}
$db = new User();
?>