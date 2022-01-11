<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservingssysteem</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<h1>Welkom bij [INSERT NAME]</h1>
<nav class="sidenav">
    <input type="button" value="Home" onclick="location.href='index.php'">
    <input type="button" value="Afspraak" onclick="location.href='registratie.php'">
    <input type="button" value="Login" onclick="location.href='login.php'">
    <input type="button" value="Contact" onclick="location.href='contact.php'">
    <input type="button" value="Afspraken" onclick="location.href='afspraken.php'">
</nav>
<div class="contact">
    <form>
        <label for="firstName">Naam:</label><br>
        <input type="text" id="naam" name="naam"><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br>
        <label for="vraag">Vraag:</label><br>
        <textarea id="vraag" name="vraag" rows="10" cols="18"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>


