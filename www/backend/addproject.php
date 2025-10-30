<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Dotenv\Dotenv;

require './vendor/autoload.php';

// Dotenv load 
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


// Form check
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // connection to db
    $servername = "db";
    $dbusername = $_ENV['DB_USER'];
    $dbpassword = $_ENV['DB_PASSWORD'];
    $dbname = "db";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }

    // form data
    $title       = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $image       = $_POST['image'] ?? '';
    $category    = $_POST['category'] ?? '';
    $areas       = $_POST['areas'] ?? '';

    $stmt = $conn->prepare("INSERT INTO projekte (title, description, image, category, areas) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $title, $description, $image, $category, $areas);

    if ($stmt->execute()) {
        $newId = $stmt->insert_id;

        // Rückgabe des neuen Projekts
        echo json_encode([
            "id" => $newId,
            "title" => $title,
            "description" => $description,
            "image" => $image,
            "category" => $category,
            "areas" => $areas
        ]);
    } else {
        echo json_encode(["error" => $stmt->error]);
    }
    $stmt->close();
    $conn->close();
}
