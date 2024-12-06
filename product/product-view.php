<?php

session_start();
require "product.php";

$product = new Product();

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login-user.php');
    exit();
}


if (!isset($_SESSION['email'])) {
    header('Location: login-user.php');
    exit();
}

$producten = $product->selectProduct();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
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
<h2>Producten</h2>

<table>
        <tr>
            <th>Product Code</th>
            <th>Naam</th>
            <th>Foto</th>
            <th>Prijs</th>
        </tr>

        <?php 
        foreach ($producten as $products) {
            echo "<tr>";
            echo "<td>".$products['productCode']."</td>";
            echo "<td>".$products['productNaam']."</td>";
            echo "<td>".$products['foto']."</td>";
            echo "<td>".$products['prijs']."</td>";
            echo "</tr>";
        } ?>
            
    </table>

</div>
</div>
 
</body>
</html>