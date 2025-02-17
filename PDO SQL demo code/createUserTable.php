<?php
//Skapa en tabell som heter users.

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL
    )";

    $conn->exec($query);
    echo "Table 'users' created successfully"; 

} catch(PDOException $e) {
    echo $e->getMessage();
}


?>
