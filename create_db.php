<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306', 'root', '');
    $pdo->exec('CREATE DATABASE IF NOT EXISTS `wynestore_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;');
    echo "Database `wynestore_db` created or already exists successfully.\n";
} catch (Exception $e) {
    echo "Error creating database: " . $e->getMessage() . "\n";
}
