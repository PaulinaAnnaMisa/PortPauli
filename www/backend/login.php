<?php
session_start();
use Dotenv\Dotenv;

require './vendor/autoload.php';

// Dotenv load 
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
 
// Form check
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // connection to db
    $servername = "db";
    $dbusername =$_ENV['DB_USER'];
    $dbpassword = $_ENV['DB_PASSWORD'];
    $dbname = "db";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }

    // Form datas
    $username = $_POST["username"];
    $password = $_POST["password"];

    // SQL prepare
    $stmt = $conn->prepare("SELECT id, password FROM login WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Password check
        if ($password === $row["password"]) {
            $_SESSION["login_id"] = $row["id"];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Falsches Passwort!";
        }
    } else {
        echo "Benutzer " . htmlspecialchars($username) . " nicht gefunden!";
    }
    $stmt->close();
    $conn->close();
}