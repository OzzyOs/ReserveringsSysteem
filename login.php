<?php
/**@var $db **/
session_start();
require_once 'includes/database_connection.php';

if(isset($_SESSION['loggedInUser'])) {
    header("location:afspraken.php");
    exit;
}
//inloggen
if(isset($_POST['submit'])) {
    $username = mysqli_escape_string($db,$_POST['username']);
    $password = $_POST['password'];
    $errors = [];
    //Nu gaan we een vergelijking maken om te kijken of we de juiste informatie hebben ingevuld.

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($db, $query) or die ('Error: '.$query);
    $user = mysqli_fetch_assoc($result);

    //Nu gaan we kijken of het WW overeenkomt met het WW uit de DB.
    if($user) {
        if(password_verify($password,$user['password'])) {
            //Nu gaan we een sessie creeeren voor de gebruiker
            $_SESSION['loggedInUser'] = [
                'username' => $user['username'],
                'id'=> $user['id']
            ];
            //Hier komt de redirect
            header("location: afspraken.php");
            exit;
        }   else {
            $errors[]= "Uw login gegevens zijn verkeerd";
        }

    } else {
        $errors[]="Uw login gegevens zijn verkeerd";
    }

}

// HIERONDER CODE OM EEN NIEUW ACCOUNT AAN TE MAKEN IN HET DB
//if (isset($_POST['submit'])) {
//    $username = mysqli_escape_string($db, $_POST['username']); //Beveiligd tegen SQL Injections.
//    $password = $_POST['password'];
//
//
//    $errors = [];
//    if ($username == "") {
//        $errors['username'] = "Vul aub een username in";
//    }
//    if ($password == "") {
//        $errors['password'] = "Vul aub een password in";
//    }
//
//
//
//    if (empty($errors)) {
//        //INSERT in DB
//        $password = password_hash($password, PASSWORD_DEFAULT);
//
//        $query = "INSERT INTO user (username, password)
//                    VALUES('$username', '$password')";
//        $result = mysqli_query($db, $query);
//
//        if ($result) {
//            $success = "Uw account is gemaakt!";
//        } else {
//            $errors['db'] = mysqli_error($db);
//        }
//    }
//}
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

<div class="login">
    <form action='' method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <span><?=$errors['username'] ?? '' ?></span><br>

        <label for="password">Wachtwoord:</label><br>
        <input type="password" id="password" name="password"><br>
        <span><?=$errors['password'] ?? '' ?></span>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>

</body>
</html>

