<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reserveringssysteem</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>

<body>
<h1>WELKOM</h1>

<nav class="sidenav">
    <input type="button" value="Home" onclick="location.href='index.php'">
    <input type="button" value="Afspraak" onclick="location.href='registratie.php'">
    <input type="button" value="Login" onclick="location.href='login.php'">
    <input type="button" value="Contact" onclick="location.href='contact.php'">

    <?php if(isset($_SESSION['loggedInUser'])) : ?>
        <input type="button" value="Logout" onclick="location.href='logout.php'">
    <?php endif ; ?>

</nav>

<div class="wrapper">
    <div class="main-wrapper">
        <div class="main-wrapper-div1">
        </div>
        <div class="main-wrapper-div2">
            <img class="home-img" src="includes/background.png" alt="" width="500" height="300">
            <p class="main-text">DEBBY JORIS COACHING
            </p><br>
        </div>

    </div>

    <div class="info-wrapper">

        <div class="info-wrapper-div">

            <div class="info-wrapper-div-one">
                <img src="includes/background.png" height="100px" width="220px">
                <p>TRAJECT</p>
                <input class="button-one" type="button" value="Afspraken" onclick="location.href='contact.php'">
            </div>

            <div class="second-wrapper-div3">
                <img src="includes/background.png" height="100px" width="220px">
                <p>TRAJECT </p>
                <input class="button-one" type="button" value="Afspraken" onclick="location.href='contact.php'">
            </div>

            <div class="second-wrapper-div4">
                <img src="includes/background.png" height="100px" width="220px">
                <p>TRAJECT</p>
                <!-- <img src="includes/background.png" height="100px" width="220px"> -->
                <div class="button-wrapper">
                    <input class="button-one" type="button" value="Afspraken" onclick="location.href='contact.php'">
                </div>
            </div>

            <div class="second-wrapper-div5">
                <p class="info-text">
                    INFO
                </p>
            </div>
        </div>

    </div>
</div>
</body>
</html>
