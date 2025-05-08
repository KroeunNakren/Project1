<?php
$host = 'localhost';       // or your PostgreSQL server hostname
$db   = 'WEBM1';    // your PostgreSQL database name
$user = 'postgres';    // your PostgreSQL username
$pass = 'Nakrin121234';    // your PostgreSQL password
$dsn  = "pgsql:host=$host;dbname=$db";

try {
    // Create PDO instance and assign to $pdo
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION  // throw exceptions on errors
    ]);
} catch (PDOException $e) {
    // Handle connection error
    echo "Connection failed: " . $e->getMessage();
    exit;  // stop execution if connection fails
}
?>
