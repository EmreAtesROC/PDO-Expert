<?php

session_start();
require "user.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $user = $db->loginUser($_POST["email"]);
        if ($user && password_verify($_POST["wachtwoord"], $user["password"])) {
            $_SESSION['email'] = $user["email"];
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
<h1>Inloggen</h1>
<form method="POST" class="login-form">

    <input type="email" name="email" placeholder="E-mailadres" required><br>
    <input type="password" name="wachtwoord" placeholder="Wachtwoord" required><br>
    <input type="submit" name="submit" value="Inloggen">
</form>
</div>
</div>

</body>
</html>

