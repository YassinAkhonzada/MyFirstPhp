<?php

// Check if the form was submitted
if (isset($_POST["name"])) {

    $cookie_name = "remembername";
    $cookie_value = $_POST["name"];

    // Create the cookie for 1 hour
    setcookie($cookie_name, $cookie_value, time() + 3600, "/");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Example</title>
</head>
<body>

<?php

// Check if the cookie exists
if (isset($_COOKIE["remembername"])) {

    echo "Welcome back, " . $_COOKIE["remembername"] . "!";

} else {

?>

<form action="" method="post">
    Name:
    <input type="text" name="name">
    <input type="submit" value="Save Name">
</form>

<?php

}

?>

</body>
</html>