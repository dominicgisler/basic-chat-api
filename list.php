<?php

$pdo = require 'pdo.php';

header('Content-Type: application/json');
$stmt = $pdo->query("SELECT * FROM chat;");
$rooms = [];
while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
    if (!isset($rooms[$row['room']])) {
        $rooms[$row['room']] = [
            'messages' => 0,
            'latest_message' => ''
        ];
    }
    $rooms[$row['room']]['messages']++;
    if (strtotime($row['date']) > $rooms[$row['room']]['latest_message']) {
        $rooms[$row['room']]['latest_message'] = $row['date'];
    }
}
echo json_encode($rooms);