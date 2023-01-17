<?php

$conn;

try {
    $servername = "localhost:3306";
    $dbname = "praticaltest";
    $username = "root";
    $password = "";

    $conn = new PDO(
        "mysql:host=$servername; dbname=praticaltest",
        $username,
        $password
    );

    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
