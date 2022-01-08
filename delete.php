<?php
/**@var $db */
require_once "includes/database_connection.php"; // Using database connection file here


$id = $_GET['id']; // get id through query string

$del = mysqli_query($db,"DELETE FROM Reserveringen WHERE id = '$id'"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
    header("Location: afspraken.php"); // redirects to all records page
    exit;
}
else
{
    echo "Error deleting record"; // display error message if not delete
}

