<?php
require "connect.php";

$id = $_GET["id"];

/* UPDATE */
if (isset($_POST["update"])) {
    $naam = $_POST["naam"];
    $prijs = $_POST["prijs"];
    $voorraad = $_POST["voorraad"];

    $sql = "UPDATE producten
            SET naam = ?, prijs = ?, voorraad = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$naam, $prijs, $voorraad, $id]);

    echo "Product succesvol gewijzigd.<br>";
}

/* Product ophalen */
$sql = "SELECT * FROM producten WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$product = $stmt->fetch();
?>

<h2>Product wijzigen</h2>

<form method="post">
    Naam:
    <input type="text" name="naam" value="<?= $product["naam"] ?>"><br><br>

    Prijs:
    <input type="number" step="0.01" name="prijs" value="<?= $product["prijs"] ?>"><br><br>

    Voorraad:
    <input type="number" name="voorraad" value="<?= $product["voorraad"] ?>"><br><br>

    <input type="submit" name="update" value="Opslaan">
</form>

<a href="opdracht5.php">Terug naar overzicht</a>