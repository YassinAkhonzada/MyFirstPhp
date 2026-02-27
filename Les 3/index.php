<?php

if(isset($_GET['voornaam'])){
    echo $_GET['voornaam'];
    echo $_GET['achternaam'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="get">
        <input type="number" name="hoeveelheid" id="hoeveelheid">
        <input type="submit">
    </form>
    
</body>
</html>