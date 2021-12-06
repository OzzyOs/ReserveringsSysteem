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
    <button onclick="location.href='registratie.php'">Registratie</button>
    <button onclick="location.href='login.php'">Login</button>
    <button onclick="location.href='index.php'">Home</button>
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


