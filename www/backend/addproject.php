<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json'); */// only for development

require_once 'config.db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Form data
    $title       = htmlspecialchars($_POST['title'] ?? '');
    $description = htmlspecialchars($_POST['description'] ?? '');
    $image       = htmlspecialchars($_POST['image'] ?? '');
    $category    = htmlspecialchars($_POST['category'] ?? '');
    $areas       = htmlspecialchars($_POST['areas'] ?? '');

    // empty check
    if (empty($title) || empty($description) || empty($image) || empty($category) || empty($areas)) {
        #http_response_code(400);
        echo json_encode(["error" => "Bitte fülle alle Felder aus."]);
        exit;
    }

    #var_dump($_POST); //debugg

    // SQL-Statement prepare
    $stmt = $mysqli->prepare("INSERT INTO projekte (title, description, image, category, areas) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $title, $description, $image, $category, $areas);

    // Execute and check result
    if ($stmt->execute()) {
        $newId = $stmt->insert_id;

        echo json_encode([
            "id" => $newId,
            "title" => $title,
            "description" => $description,
            "image" => $image,
            "category" => $category,
            "areas" => $areas
        ]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Fehler beim Einfügen: " . $stmt->error]);
    }

    $stmt->close();
    $mysqli->close();
}
