<?php
//Kod för att ansluta till databas
//Behöver att det finns en databas som heter "your_database", den går att skapa manuellt i phpMyAdmin

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
