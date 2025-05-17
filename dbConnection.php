<?php
//$host = 'localhost';
//$db   = 'WEBM1';
//$user = 'postgres';
//$pass = 'Nakrin121234';
/*$dsn  = "pgsql:host=$host;dbname=$db";

try {
   $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
  exit;
}*/
$host = '127.0.0.1';
$db   = 'WEBM1';
$user = 'root';
$pass = 'Nakrin121234'; // or 'Nakrin121234' if verified
$port = 3307;
$dsn  = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}
?>


