<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music Collection</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<h1>Welkom bij [INSERT NAME]</h1>
<nav>
    <button onclick="location.href='index.php'">Home</button>
    <button onclick="location.href='login.php'">Login</button>
    <button onclick="location.href='contact.php'">Contact</button>
</nav>
<div class="registratie">
<form>
    <label for="firstName">Naam:</label><br>
    <input type="text" id="firstName" name="Naam"><br>
    <label for="lastName">Achternaam:</label><br>
    <input type="text" id="lastName" name="Achternaam"><br>
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email"><br>
    <label for="password">Wachtwoord:</label><br>
    <input type="text" id="password" name="password">
</form>
</div>

</body>
</html>
