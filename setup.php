<?php

if (file_exists(__DIR__ . '/.setup')) {
    die('Setup already done!');
}

$pdo = require 'pdo.php';

$pdo->exec("
CREATE TABLE IF NOT EXISTS chat (
    message_id INTEGER PRIMARY KEY,
    date       TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    room       VARCHAR(255) NOT NULL,
    user       VARCHAR(255) NOT NULL,
    message    TEXT NOT NULL
);
");
file_put_contents('.setup', '');
