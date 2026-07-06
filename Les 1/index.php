<?php

// ===============================
// 1. HOE PHP WERKT
// ===============================
// PHP draait op de server.
// De browser ziet alleen de output, zoals HTML/text.
echo "<h1>PHP oefening</h1>";


// ===============================
// 2. VARIABELEN EN DATATYPES
// ===============================

$naam = "Ahmed";      // String: tekst
$leeftijd = 18;       // Integer: heel getal
$prijs = 9.99;        // Float: kommagetal
$isStudent = true;    // Boolean: true of false

echo $naam . "<br>";  // Laat de naam zien
var_dump($isStudent); // Laat datatype + waarde zien


// ===============================
// 3. OPERATOREN
// ===============================

$a = 10;
$b = 3;

echo $a + $b . "<br>"; // Optellen: 13
echo $a - $b . "<br>"; // Aftrekken: 7
echo $a * $b . "<br>"; // Vermenigvuldigen: 30
echo $a / $b . "<br>"; // Delen
echo $a % $b . "<br>"; // Modulo: rest van deling

$a += 5; // Zelfde als: $a = $a + 5;


// ===============================
// 4. IF / ELSE
// ===============================

$leeftijd = 17;

// Als leeftijd 18 of hoger is, print Volwassen.
// Anders print Minderjarig.
if ($leeftijd >= 18) {
    echo "Volwassen<br>";
} else {
    echo "Minderjarig<br>";
}


// ===============================
// 5. LUSSEN
// ===============================

// for gebruik je als je weet hoe vaak iets moet herhalen.
for ($i = 1; $i <= 5; $i++) {
    echo $i . "<br>"; // Print 1 t/m 5
}

// while herhaalt zolang de conditie waar is.
$teller = 1;

while ($teller <= 3) {
    echo "Teller: $teller <br>";
    $teller++; // Verhoogt teller met 1
}


// ===============================
// 6. ARRAYS
// ===============================

// Array bewaart meerdere waarden in één variabele.
$kleuren = ["rood", "groen", "blauw"];

echo $kleuren[0] . "<br>"; // Print rood, want index begint bij 0


// ===============================
// 7. FOREACH + ARRAYFUNCTIES
// ===============================

// foreach loopt door elke waarde van een array.
foreach ($kleuren as $kleur) {
    echo $kleur . "<br>";
}

echo count($kleuren) . "<br>"; // Telt aantal waarden: 3

sort($kleuren); // Sorteert de array alfabetisch


// ===============================
// 8. FUNCTIES
// ===============================

// Functie = herbruikbaar blok code.
function begroet($naam) {
    echo "Hallo $naam <br>";
}

begroet("Ahmed"); // Roept de functie aan

function berekenSom($getal1, $getal2) {
    return $getal1 + $getal2; // Geeft resultaat terug
}

echo berekenSom(5, 8) . "<br>"; // Print 13


// ===============================
// 9. STRINGS EN DATUMS
// ===============================

$tekst = "Ik hou van JavaScript";

echo str_replace("JavaScript", "PHP", $tekst) . "<br>";
// Vervangt JavaScript door PHP

echo strlen("Hallo") . "<br>";
// Telt tekens: 5

echo substr("Dit is een lang bericht", 0, 10) . "<br>";
// Pakt eerste 10 tekens

echo strtoupper("jan") . "<br>";
// Maakt hoofdletters

echo strtolower("JAN") . "<br>";
// Maakt kleine letters

echo trim("   test   ") . "<br>";
// Haalt spaties aan begin/einde weg

echo date("Y-m-d") . "<br>";
// Print datum als jaar-maand-dag


// ===============================
// 10. FORMULIER MET GET
// ===============================
// GET-data komt zichtbaar in de URL.
// Voorbeeld URL: index.php?gebruikersnaam=Jan

if (isset($_GET["gebruikersnaam"])) {
    $naam = $_GET["gebruikersnaam"];
    echo "GET naam: " . $naam . "<br>";
}


// ===============================
// 11. FORMULIER MET POST
// ===============================
// POST-data is niet zichtbaar in de URL.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? "";
    echo "POST naam: " . $username . "<br>";
}

?>

<!-- Dit formulier stuurt data via POST -->
<form method="POST">
    <input type="text" name="username" placeholder="Naam">
    <button type="submit">Verstuur</button>
</form>

<?php


// ===============================
// 12. VALIDATIE
// ===============================

$username = $_POST["username"] ?? "";
$errors = [];

// Controleert of username leeg is.
if (empty($username)) {
    $errors[] = "Gebruikersnaam is verplicht.";
}

// Controleert of username minimaal 3 tekens heeft.
if (strlen($username) < 3) {
    $errors[] = "Gebruikersnaam is te kort.";
}

// Als er geen errors zijn, is alles goed.
if (empty($errors)) {
    echo "Geen fouten<br>";
} else {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
}


// ===============================
// 13. COOKIES
// ===============================

// Cookie maken.
// Moet normaal vóór HTML-output staan.
setcookie("gebruikersnaam", "Ahmed", time() + 3600);

// Cookie lezen.
if (isset($_COOKIE["gebruikersnaam"])) {
    echo "Cookie: " . $_COOKIE["gebruikersnaam"] . "<br>";
} else {
    echo "Cookie is gezet, refresh de pagina.<br>";
}

// Cookie verwijderen.
// setcookie("gebruikersnaam", "", time() - 3600);


// ===============================
// 14. BESTANDEN LEZEN / SCHRIJVEN
// ===============================

$bestand = "data.txt";

// Schrijft tekst naar bestand.
// FILE_APPEND betekent: toevoegen, niet overschrijven.
file_put_contents($bestand, "Nieuwe regel\n", FILE_APPEND);

// Leest volledige bestand.
$inhoud = file_get_contents($bestand);

echo nl2br($inhoud); // Laat bestand zien met regelafbrekingen


// ===============================
// 15. PROJECT CRUD MET JSON
// ===============================
// CRUD = Create, Read, Update, Delete

$jsonBestand = "items.json";

// Als bestand niet bestaat, maak lege array.
if (!file_exists($jsonBestand)) {
    file_put_contents($jsonBestand, json_encode([]));
}

// READ: lees items uit JSON-bestand.
$items = json_decode(file_get_contents($jsonBestand), true);

// CREATE: nieuw item toevoegen.
if (isset($_POST["nieuw_item"]) && !empty($_POST["nieuw_item"])) {
    $items[] = [
        "id" => time(),
        "title" => $_POST["nieuw_item"],
        "completed" => false
    ];

    file_put_contents($jsonBestand, json_encode($items));
}

// DELETE: item verwijderen via URL ?delete=id
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];

    foreach ($items as $key => $item) {
        if ($item["id"] == $id) {
            unset($items[$key]);
        }
    }

    file_put_contents($jsonBestand, json_encode(array_values($items)));
}

?>

<h2>Mini CRUD</h2>

<form method="POST">
    <input type="text" name="nieuw_item" placeholder="Nieuwe taak">
    <button type="submit">Toevoegen</button>
</form>

<ul>
<?php foreach ($items as $item): ?>
    <li>
        <?= htmlspecialchars($item["title"]) ?>
        <a href="?delete=<?= $item["id"] ?>">Verwijderen</a>
    </li>
<?php endforeach; ?>

<?php




$leeftijd = 18;

if ($leeftijd >= 18) {
    echo "Toegang toegestaan.";
} else {
    echo "Toegang geweigerd.";
}

$CIJFER = 8;

if ($CIJFER >= 6) {
  echo "Geslaagd.";
} else {
  echo "Niet geslaagd.";
}


$getal = 12;

if ($getal % 2 == 0) {
    echo "Even getal";
} else {
    echo "Oneven getal";
}



$cijfers = array(4, 7, 5, 8, 3);

foreach ($cijfers as $value) {
    if ($value >= 6) {
        echo "Geslaagd <br>";
    } else {
        echo "Gezakt <br>";
    }
}


$naam = "Ahmed";

function begroet($naam) {
    echo "Hello, $naam!";
}

begroet(Ahmed);



$leeftijd = 17;
function isVolwassen($leeftijd) {
if ($leeftijd >= 18) {
    echo "Volwassen";
} else {
    echo "Minderjarig";
}
}
isVolwassen(17);




function berekenSom($a, $b) {
    $z = $a + $b;

    echo "De som van $a en $b is: $z";
}

berekenSom(5, 10);

$tekst = "Ik hou van JavaScript";

echo str_replace("JavaScript", "PHP", $tekst);

echo date("Y-m-d");


$naam = $_GET["gebruikersnaam"];



$username = "";

if (empty($username)) {
    echo "Gebruikersnaam is verplicht.";
}
// ===============================
// EXTRA ONDERWERPEN
// ===============================


// ===============================
// DO...WHILE
// ===============================
// Een do...while voert de code ALTIJD minimaal 1 keer uit.
// Daarna controleert PHP pas de conditie.

$i = 1;

do {
    echo "Getal: $i <br>";
    $i++;
} while ($i <= 5);

// Uitvoer:
// Getal: 1
// Getal: 2
// Getal: 3
// Getal: 4
// Getal: 5



// ===============================
// BREAK
// ===============================
// break stopt de lus direct.

for ($i = 1; $i <= 10; $i++) {

    if ($i == 5) {
        break; // Stop bij 5
    }

    echo $i . "<br>";
}

// Uitvoer:
// 1
// 2
// 3
// 4



// ===============================
// CONTINUE
// ===============================
// continue slaat één ronde van de lus over.

for ($i = 1; $i <= 5; $i++) {

    if ($i == 3) {
        continue; // Sla de 3 over
    }

    echo $i . "<br>";
}

// Uitvoer:
// 1
// 2
// 4
// 5



// ===============================
// SWITCH
// ===============================
// switch gebruik je als één variabele meerdere mogelijke waarden heeft.

$dag = "maandag";

switch ($dag) {

    case "maandag":
        echo "Vandaag is het maandag.<br>";
        break;

    case "dinsdag":
        echo "Vandaag is het dinsdag.<br>";
        break;

    case "woensdag":
        echo "Vandaag is het woensdag.<br>";
        break;

    default:
        echo "Onbekende dag.<br>";
}



// ===============================
// == EN ===
// ===============================

// == vergelijkt alleen de waarde.
// PHP kijkt NIET naar het datatype.

$a = 5;
$b = "5";

if ($a == $b) {
    echo "== : Gelijk<br>";
}

// Uitvoer:
// == : Gelijk



// === vergelijkt de waarde EN het datatype.

if ($a === $b) {
    echo "=== : Identiek<br>";
} else {
    echo "=== : Niet identiek<br>";
}

// Uitvoer:
// === : Niet identiek



// Nog een voorbeeld

$x = 10;
$y = 10;

if ($x === $y) {
    echo "Beide zijn identiek.<br>";
}

// Uitvoer:
// Beide zijn identiek.
</ul>