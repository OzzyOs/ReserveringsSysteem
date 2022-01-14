<?php
/** @var $db */
require_once 'includes/database_connection.php';
$id=$_GET['id'];

if (isset($_POST['submit'])) {
    $firstName = mysqli_escape_string($db, $_POST['firstName']); //Beveiligd tegen SQL Injections.
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

    $errors = [];
    if ($firstName == "") {
        $errors['firstName'] = "Vul aub uw voornaam in";
    }
    if ($lastName == "") {
        $errors['lastName'] = "Vul aub uw achternaam in";
    }
    if ($email == "") {
        $errors['email'] = "Vul aub uw email in";
    }


    if (empty($errors)) {
        //INSERT in DB
        $query = "UPDATE Reserveringen SET firstname='$firstName', lastname='$lastName', email='$email' WHERE id = '$id'";
        $result = mysqli_query($db, $query);

        if ($result) {
            $success = "Uw afspraak is gewijzigd!";
        } else {
            $errors['db'] = mysqli_error($db);
        }
    }
}
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
<div class="registratie">
    <form action="" method="post">
        <h2>Maak een afspraak</h2>

        <?php
        if (isset($errors['firstName'])) {
            echo $errors['firstName'];
        }
        ?>
        <label for="firstName">Naam:</label><br>
        <input type="text" id="firstName" name="firstName"><br>


        <?php
        if (isset($errors['lastName'])) {
            echo $errors['lastName'];
        }
        ?>

        <label for="lastName">Achternaam:</label><br>
        <input type="text" id="lastName" name="lastName"><br>


        <?php
        if (isset($errors['email'])) {
            echo $errors['email'];
        }
        ?>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br>

        <input type="submit" name="submit" value="Bevestigen">

        <?php
        if (isset($errors['db'])) {
            echo $errors['db'];
        } elseif (isset($success)) {
            echo $success;
        }
        ?>

    </form>
</div>

</body>
</html>

