<?php

session_start();
require 'user.php';

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login-user.php');
    exit();
}


if (!isset($_SESSION['email'])) {
    header('Location: login-user.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard user</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<header class="header">
        <div class="logo">
        <a href="hoofdpagina.html"><img src="pdologo.png" alt="PDO Logo"></a>        </div>
        <nav class="nav-links">
        <a class="navknop" href="..\product\product-insert.php">Product toevoegen</a>
        <a class="navknop" href="..\product\product-view.php">Producten</a>
        <form method="POST">
            <button class="register" name="logout">Uitloggen</button>
        </form>
    </nav>
</header>

<h1>Welkom</h1>
    
</body>
</html>