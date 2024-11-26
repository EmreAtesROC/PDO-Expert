<?php

require "product.php";

$product = new Product();

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product->insertProduct($_POST['productNaam'], $_POST['prijs'], $_POST['foto']);
    echo "Successvol product toegevoegd!";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product toevoegen</title>
    <link rel="stylesheet" href="C:\xampp\htdocs\PDO-Expert\user\style.css">

</head>
<body>
    
<h2>Product toevoegen</h2>
    <form method="POST">
        <input type="text" name="productNaam" placeholder="Naam">
        <input type="number" name="prijs" placeholder="Prijs">
        <input type="file" name="foto" placeholder="Foto">
        <input type="submit">
    </form>
 
</body>
</html>