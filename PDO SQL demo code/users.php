<?php
//Kod för att lista alla användare i databasen

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM users";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        echo "Name: " . $user['name'] . " - Email: " . $user['email'] . "<br>";
    }

} catch(PDOException $e) {
    echo $e->getMessage();
}

?>
