HTML Formulieren	https://www.w3schools.com/php/php_forms.asp	<form>, <input>, method="post"	action, namen van de inputvelden
$_POST	https://www.w3schools.com/php/php_superglobals_post.asp	$_POST["..."]	De naam tussen ["..."] aanpassen aan jouw inputveld
$_GET	https://www.w3schools.com/php/php_superglobals_get.asp	$_GET["id"]	De parameternaam (id) aanpassen als de opdracht iets anders gebruikt
isset()	https://www.w3schools.com/php/func_var_isset.asp	isset(...)	Gebruik $_POST, $_GET of $_COOKIE afhankelijk van de opdracht
Functies	https://www.w3schools.com/php/php_functions.asp	function, return	Functienaam en parameters aanpassen
Cookies	https://www.w3schools.com/php/php_cookies.asp	setcookie(), $_COOKIE, verwijderen van cookies	Cookienaam, waarde en geldigheid (3600 voor 1 uur) aanpassen
PDO Verbinding	https://www.w3schools.com/php/php_mysql_connect.asp	new PDO(...)	$host, $dbname, $gebruiker, $wachtwoord aanpassen
SELECT	https://www.w3schools.com/php/php_mysql_select.asp	SELECT, prepare(), execute(), fetchAll()	Tabelnaam, WHERE, kolommen aanpassen
INSERT	https://www.w3schools.com/php/php_mysql_insert.asp	INSERT INTO, VALUES, prepare(), execute()	Kolommen en ? placeholders aanpassen
UPDATE	https://www.w3schools.com/php/php_mysql_update.asp	UPDATE, SET, WHERE, execute()	Kolommen, WHERE id = ? en variabelen aanpassen
DELETE	https://www.w3schools.com/php/php_mysql_delete.asp	DELETE FROM, WHERE, execute()	Tabelnaam en id aanpassen
try/catch	https://www.w3schools.com/php/php_exceptions.asp	try { } catch (PDOException $e) { }	Eigen foutmelding toevoegen
Master/detail	2 pagina's combineren:
GET: https://www.w3schools.com/php/php_superglobals_get.asp
SELECT: https://www.w3schools.com/php/php_mysql_select.asp	$_GET["id"] + SELECT ... WHERE id = ?	Link maken met ?id= en de juiste tabel/kolommen gebruiken
CRUD	Geen aparte pagina	Combineer INSERT + SELECT + UPDATE + DELETE	Alleen de SQL en variabelen veranderen