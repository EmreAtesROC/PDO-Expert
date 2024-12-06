<?php

session_start();
require 'user.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    try {
        $db->registerUser($user, $email, $password);
        header("refresh:3;url=login-user.php");
        exit;
        } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="registerlogin.css">

</head>
<body>

<header class="header">
    <div class="logo">
        <a href="hoofdpagina.html"><img src="pdologo.png" alt="PDO Logo"></a>
    </div>
        <nav class="nav-links">
            <a href="login-user.php" class="login">Inloggen</a>
            <a href="register-user.php"class="register">Registreren</a>
        </nav>
</header>


<div class="registerlogindiv">
<div class="login-container">
<h1>Registreren</h1>
<form method="POST" class="login-form">
    <input type="text" name="user" placeholder="Gebruikersnaam" required><br>    
    <input type="email" name="email" placeholder="E-mailadres" required><br>
    <input type="password" name="password" placeholder="Wachtwoord" required><br>
    <input type="submit" name="submit" value="Registreren">
</form>
</div>
</div>
</body>
</html>