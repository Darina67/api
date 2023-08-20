<?php
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Origin: http://localhost:8080"); // Replace with your client's URL
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Specify allowed HTTP methods
header("Access-Control-Allow-Headers: Content-Type"); // Specify allowed headers

try {
    // подключаемся к серверу
    $conn = new PDO('mysql:host=localhost;dbname=students', "root", "root");
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}