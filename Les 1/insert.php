<?php

require "connect.php";

if (isset($_POST["submit"])) {

    $naam = $_POST["naam"];
    $prijs = $_POST["prijs"];
    $voorraad = $_POST["voorraad"];

    $sql = "INSERT INTO producten (naam, prijs, voorraad)
            VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->execute([$naam, $prijs, $voorraad]);

    echo "Product successfully added.";

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Product</title>
</head>
<body>

<form method="post">

    Name:
    <input type="text" name="naam"><br><br>

    Price:
    <input type="number" step="0.01" name="prijs"><br><br>

    Stock:
    <input type="number" name="voorraad"><br><br>

    <input type="submit" name="submit" value="Add Product">

</form>

</body>
</html>