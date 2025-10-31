<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.db.php';

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
