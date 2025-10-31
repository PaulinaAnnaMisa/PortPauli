<?php
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
    throw new RuntimeException("mysqli-Verbindungsfehler:" .  $mysqli->connect_error);
}