<?php
header("Content-Type: application/json");
require_once 'config.db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // datas 
    $id          = $_POST['id'] ?? '';
    $title       = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $image       = $_POST['image'] ?? '';
    $category    = $_POST['category'] ?? '';
    $areas       = $_POST['areas'] ?? '';

    // empty check
    if (empty($id) || empty($title) || empty($description) || empty($image) || empty($category) || empty($areas)) {
        echo json_encode(["error" => "Bitte fülle alle Felder aus."]);
        exit;
    }

    // update
    $stmt = $mysqli->prepare("
        UPDATE projekte 
        SET title = ?, description = ?, image = ?, category = ?, areas = ?
        WHERE id = ?
    ");
    $stmt->bind_param("sssssi", $title, $description, $image, $category, $areas, $id);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo json_encode([
                "success" => true,
                "id" => $id,
                "title" => $title,
                "description" => $description,
                "image" => $image,
                "category" => $category,
                "areas" => $areas
            ]);
        } else {
            echo json_encode(["error" => "Keine Änderungen vorgenommen oder Projekt nicht gefunden."]);
        }
    } else {
        echo json_encode(["error" => "Fehler beim Aktualisieren: " . $stmt->error]);
    }

    $stmt->close();
    $mysqli->close();
}
