<?php

session_start();
require "product.php";

$product = new Product();

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $filename = $_FILES['file']['name'];
    $locatie = "C:\xampp\htdocs\PDO-Expert\product\uploadimg" . $filename;
    $bestandInfo = pathinfo($filename);    

    $product->insertProduct($_POST['productNaam'], $_POST['prijs'], $_POST['foto']);
    echo "Successvol product toegevoegd!";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}

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
    <title>Product toevoegen</title>
    <link rel="stylesheet" href="../user/style.css">
    <link rel="stylesheet" href="../user/registerlogin.css">    
</head>
<body>

<header class="header">
        <div class="logo">
        <a href="hoofdpagina.html"><img src="../user/pdologo.png" alt="PDO Logo"></a>        </div>
        <nav class="nav-links">
        <a class="navknop" href="..\product\product-insert.php">Product toevoegen</a>
        <a class="navknop" href="..\product\product-view.php">Producten</a>
        <form method="POST">
            <button class="register" name="logout">Uitloggen</button>
        </form>
    </nav>
</header>
    
<div class="registerlogindiv">
<div class="login-container">
<h2>Product toevoegen</h2>
    <form method="POST">
        <input type="text" name="productNaam" placeholder="Naam">
        <input type="number" name="prijs" placeholder="Prijs">
        <input type="file" name="foto" placeholder="Foto">
        <input type="submit">
    </form>
</div>
</div>
 
</body>
</html>