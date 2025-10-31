<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Dotenv\Dotenv;

require './vendor/autoload.php';

// Dotenv load 
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


// connection to db
$servername = "db";
$dbusername = $_ENV['DB_USER'];
$dbpassword = $_ENV['DB_PASSWORD'];
$dbname = "db";

$mysqli = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($mysqli->connect_error) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}

// get data
$query = "SELECT * FROM projekte ORDER BY id ASC";
$result = $mysqli->query($query);

$projects = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }
}

$mysqli->close();
header('Content-Type: application/json');
echo json_encode($projects);
