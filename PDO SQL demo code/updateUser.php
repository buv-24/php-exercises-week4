<?php
//Kod för att ändra en användare

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database";

$userId = 1;
$newName = "Updated Name";
$newEmail = "updated.email@example.com";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "UPDATE users SET name = :name, email = :email WHERE id = :id";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(':name', $newName);
    $stmt->bindParam(':email', $newEmail);
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);

    $stmt->execute();

    echo "User with ID $userId updated successfully";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
