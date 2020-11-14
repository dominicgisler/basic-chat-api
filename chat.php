<?php

$pdo = require 'pdo.php';

header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $room = $_GET['room'];
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    if (!empty($data['room']) && !empty($data['user']) && !empty($data['message'])) {
        $stmt = $pdo->prepare("INSERT INTO chat (room, user, message) VALUES(?, ?, ?)");
        $stmt->execute([$data['room'], $data['user'], $data['message']]);
        $room = $data['room'];
    }
}

if (!empty($room)) {
    $stmt = $pdo->prepare("SELECT * FROM chat WHERE room = ?;");
    $stmt->execute([$room]);
    $msg = [];
    while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        $msg[] = $row;
    }
    echo json_encode($msg);
}