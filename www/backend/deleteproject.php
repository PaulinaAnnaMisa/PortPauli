<?php
header("Content-Type: application/json");
require_once 'config.db.php';

//empty check
if (empty($_POST['id'])) {
    echo json_encode(["error" => "Keine ID übergeben."]);
    exit;
}

$id = intval($_POST['id']);

//delete 
$stmt = $mysqli->prepare("DELETE FROM projekte WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) { //proof if changed at least one row
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => "Kein Projekt mit dieser ID gefunden."]);
    }
} else {
    echo json_encode(["error" => "Löschen fehlgeschlagen."]);
}

$stmt->close();
$mysqli->close();


