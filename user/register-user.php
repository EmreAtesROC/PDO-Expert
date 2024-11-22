<?php

session_start();
require 'user.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    try {
        $db->registerUser($user, $email, $password);
            echo "Registratie gelukt!";
            header("Refresh: 3; Location: login-user.php");
            exit;
        } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

<h1>Registreren</h1>
<form method="POST">
    <input type="text" name="user" placeholder="Gebruikersnaam" required><br>    
    <input type="email" name="email" placeholder="E-mailadres" required><br>
    <input type="password" name="password" placeholder="Wachtwoord" required><br>
    <input type="submit" name="submit" value="Registeren">
</form>
</body>
</html>