<?php
//Lägg till en ny user till databasen

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $name = "John Doe";
    $email = "johndoe@example.com";

    $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);

    $stmt->execute();
    echo "Ny användare tillagd.";

} catch(PDOException $e) {
    // Om det uppstår ett fel, visa felmeddelande
    echo $e->getMessage();
}

?>
