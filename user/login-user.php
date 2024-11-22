<?php

session_start();
require "user.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $user = $db->loginUser($_POST["mail"]);
        if ($user && password_verify($_POST["wachtwoord"], $user["password"])) {
            header("Location:dashboard-user.php");
        } else {
            echo "De gegevens kloppen niet!";
        }
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
    <title>Inloggen</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>

<div class="formulier">
<h1>Inloggen</h1>
<form method="POST">
    <input type="email" name="mail" placeholder="E-mailadres" required><br>
    <input type="password" name="wachtwoord" placeholder="Wachtwoord" required><br>
    <input type="submit" name="submit" value="Inloggen">
</form>
</div>
</body>
</html>