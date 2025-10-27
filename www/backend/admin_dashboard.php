<?php
session_start();

// Überprüfe, ob der Benutzer bereits angemeldet ist
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: admindashboard.html");
    exit;
}
?>


