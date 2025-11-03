<?php
header("Content-Type: application/json");
require_once 'config.db.php';

//if empty fields
if (empty($_POST['id'])) {
    echo json_encode(["error" => "Keine ID übergeben."]);
    exit;
}

$id = intval($_POST['id']);

//delete
$stmt = $mysqli->prepare("DELETE FROM projekte WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => "Kein Projekt mit dieser ID gefunden."]);
    }
} else {
    echo json_encode(["error" => "Löschen fehlgeschlagen."]);
}

$stmt->close();
$mysqli->close();


