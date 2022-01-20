<?php
session_start();
// Gegevens voor de connectie
/** @var $db */
include_once 'includes/database_connection.php';                // Stap 2: Foutafhandeling. Als verbinding niet gelukt is, wordt
//"or die" uitgevoerd. Deze stopt de code en toont de
// foutmelding op het scherm

// Stap 3: Query naar de database opbouwen. Het is belangrijk dat dit
//         apart gebeurt zodat je deze apart kunt tonen

$query = "SELECT * FROM Reserveringen"; // Stap 4: Query uitvoeren op de database. Als dit goed gaat, geeft
//mysqli_query een mysqli_result terug. Let op, dit is een tabel.

// Stap 5: Foutafhandeling. Als de query niet uitgevoerd kan worden treedt
//         er een foutmelding op via "or die". Ook de query, met ingevulde
//         variabelen, wordt op het scherm getoond. Deze kan je kopieren
//         en plakken in PhpMyAdmin om te kijken waarom het fout gaat.
$result = mysqli_query($db, $query)
or die('Error ' . mysqli_error($db) . ' with query ' . $query); //De pagina laadt niet en je krijgt een error, het is ook wel een exit functie.

// Stap 6: Resultaat verwerken. Er wordt een nieuwe array gemaakt waarin alle
//         rijen uit de db komen. In dit geval is een rij een album.
$reserveringen = [];
//         mysqli_fetch_assoc haalt een rij uit de db en zet deze om naar
//         een associatieve array. De namen van de index corresponderen met de
//         kolomnamen (velden) van de tabel
//         Als er geen rijen meer zijn in het resultaat geeft mysqli_fetch_assoc
//         'false' terug en stopt de while loop.
//         De 'while' is alleen nodig als er meerdere 'reserveringen' opgehaald kunnen worden.
while ($row = mysqli_fetch_assoc($result)) {
    // elke rij (dit is een album) wordt aan de array 'albums' toegevoegd.
    $reserveringen[] = $row;
}

// Stap 7: Sluit de verbinding met de db. Deze is niet meer nodig. Al het
//         resultaat zit in de variabele $reserveringen


mysqli_close($db);

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

    <?php if(isset($_SESSION['loggedInUser'])) : ?>
        <input type="button" value="Logout" onclick="location.href='logout.php'">
    <?php endif ; ?>

</nav>
<form action="" method="post">
    <table class="afsp_index">
        <tbody>
        <tr>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Email</th>
        </tr>

        <?php
        foreach ($reserveringen as $reserveringen) { ?>
            <tr>
                <td><?= $reserveringen['firstname'] ?></td>
                <td><?= $reserveringen['lastname']?></td>
                <td><?= $reserveringen['email'] ?></td>
                <td><a href="delete.php?id=<?= $reserveringen['id'] ?>">Delete</a></td>
                <td><a href="edit.php?id=<?= $reserveringen['id'] ?>">Update</a></td>


            </tr>
        <?php } ?>
        </tbody>
    </table>
</form>
</body>
</html>