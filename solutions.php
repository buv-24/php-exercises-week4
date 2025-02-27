<?php
require 'db_connection.php';
session_start();
$_SESSION['username'] = "admin";

?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Övningar</title>
    <style>
        h2 {
            margin:0px;
            font-size: 1.1rem;
        }

        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 1px;
            text-align: left;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        .grid-item {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
<h1>PHP Övningar vecka 4</h1>

<div class="grid-container">
<div class="grid-item">

Övning 1:<h2>MyFirstDB</h2> 
<?php
//Skapa en MySQL databas med PHPMyAdmin via http://localhost/phpmyadmin/
//Obs, glöm inte att starta MySQL med XAMPP först.
//Skriv PHP-kod för att ansluta till en MySQL-databas. Skriv ut "Success" om du lyckades ansluta och "Failure" om det inte funkade.

if($conn){
    echo "Success";
}

?>
</div>

<div class="grid-item">
Övning 2:<h2>TableCreator</h2> 
<?php
//Skapa en tabell manuellt med PHPmyadmin som heter users, med kolumnerna id och name, och email. Checka i rutan AI (auto increment) vid id kolumnen.
//Lägg till en användare med valfritt namn via PHPMyAdmin.
//Hämta alla användare med hjälp av PHP.

try {

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
</div>

<div class="grid-item">
Övning 3:<h2>SELECT*</h2>
<?php
//Skriv ett PHP-skript för att hämta alla användare med ett specifikt namn och visa dem i en lista.

try {

    $name = "Martin";
    $query = "SELECT * FROM users WHERE name =:name";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $name);

    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        echo "<li>Name: " . $user['name'] . " - Email: " . $user['email'] . "</li>";
    }

} catch(PDOException $e) {
    echo $e->getMessage();
}


?>
</div>

<div class="grid-item">
Övning 4:<h2>UpdateSession</h2> 
<?php
//Skriv ett PHP-script som startar en session och visar ett meddelande om att sessionen har startats.
//Skapa ett script för att uppdatera en session-variabel (t.ex. ändra användarnamn eller e-postadress) och visa den uppdaterade informationen.
  // Om sessionen inte har ett användarnamn, sätt ett standardvärde

if(isset($_SESSION['username'])){
    echo "Det finns en session som är " . $_SESSION['username'];
}else{
    echo "Det finns ingen session som heter username";
}

$_SESSION['username'] = "Peter";

echo "<br><br>Det finns en session som är " . $_SESSION['username'];

?>
</div>

<div class="grid-item">
Övning 5:<h2>CheckIfEmailExists</h2>
<?php 
//Skriv ett PHP-skript för att kontrollera om en e-postadress redan finns i databasen innan en ny användare infogas. Visa ett meddelande om e-postadressen redan finns.

$name = "Joel";
$email = "charlie@example.com";

$query = "SELECT * FROM users WHERE email = :email";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($result) {
    echo "Email finns";

} else {
    echo "Email finns inte";

    $insertQuery = "INSERT INTO users (name, email) VALUES (:name, :email)";
    $insertStmt = $conn->prepare($insertQuery);
    
    $insertStmt->bindParam(':name', $name);
    $insertStmt->bindParam(':email', $email);

    $insertStmt->execute();
    echo "Användare läggs till.";
}



?>
</div>

<div class="grid-item">
Övning 6:<h2>SQLSearch</h2>
<?php
//Skriv ett PHP-skript för att söka efter användare vars namn innehåller ett specifikt ord (använd LIKE i SQL) och visa resultaten.


$searchKeyword = "Doe";

$query = "SELECT * FROM users WHERE name LIKE :search";

$stmt = $conn->prepare($query);

$searchTerm = "%" . $searchKeyword . "%";

$stmt->bindParam(':search', $searchTerm); 
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($result);


?>
</div>
<div class="grid-item">
Övning 7:<h2>GetById</h2>
<?php
//Skriv en PHP-funktion som tar en användares id som parameter och returnerar deras information från users-tabellen. Använd funktionen för att visa en specifik användare på en sida.


function getUserById($userId) {

    require 'db_connection.php';

    $query = ("SELECT id, name, email FROM users WHERE id = :id");
    $stmt = $conn->prepare($query);

    $stmt->bindParam(":id", $userId, PDO::PARAM_INT);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

$user = getUserById(1);

    foreach ($user as $key => $value) {
        echo $key . ': ' . $value . '<br>';
    }


?>
</div>

<div class="grid-item">
Övning 8:<h2>UpdateForm</h2>
<?php
//Skriv ett PHP-skript som hämtar en användares information från databasen baserat på deras id och visar den i ett HTML-formulär så att användaren kan uppdatera sin data. Uppdatering behöver inte vara möjlig.


$user = getUserById(10);

?>

<form>
        <label for="id">ID:</label><br>
        <input type="text" name="id" value="<?php echo $user['id']; ?>"><br><br>

        <label for="name">Namn:</label><br>
        <input type="text"  name="name" value="<?php echo $user['name']; ?>"><br><br>

        <label for="email">E-post:</label><br>
        <input type="email" name="email" value="<?php echo $user['email']; ?>"><br><br>

        <!-- Ingen uppdatering är möjlig, så vi lämnar inga submit-knappar -->
    </form>

</div>

<div class="grid-item">
Övning 9:<h2>WebbshopVarukorg</h2>
<?php
//Skriv ett PHP-skript som simulerar en varukorg. När sidan uppdateras, ska produkten sparas i en session. Visa varukorgens innehåll på en annan sida. Nedan finns en länk till den andra sidan.

$product = "Paket";
$_SESSION['cart'] = [];
//$_SESSION['cart'][] = $product;


// Visa varukorgens innehåll
if (!empty($_SESSION['cart'])) {

    print_r($_SESSION['cart']);

    

    //print_r($_SESSION['cart']);
    
} else {
    echo "Din varukorg är tom.";
}

?>
<a href="otherPage.php">Link to other page</a>
</div>

<div class="grid-item">
Övning 10:<h2>SelectSessionValue</h2> 
<?php
//Skriv ett PHP-skript som använder en dropdown list med en submit knapp för att välja värdet på en session. Detta värde kommer att sparas efter refresh av sidan eftersom det ligger i en session.

// Kontrollera om användaren har skickat in formuläret
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sätt sessionen med det valda värdet
    $_SESSION['selected_value'] = $_POST['value'];
}

// Hämta det valda värdet från sessionen om det finns
$selected_value = isset($_SESSION['selected_value']) ? $_SESSION['selected_value'] : '';
?>

<form method="POST">
    <select name="value">
        <option value="Value1" <?php if ($selected_value == 'Value1') echo 'selected'; ?>>Värde 1</option>
        <option value="Value2" <?php if ($selected_value == 'Value2') echo 'selected'; ?>>Värde 2</option>
        <option value="Value3" <?php if ($selected_value == 'Value3') echo 'selected'; ?>>Värde 3</option>
    </select>
    <input type="submit" value="Välj">
</form>


</div>

<div class="grid-item">
Övning 11:<h2>LoginThroughDatabase</h2>
<?php
//Skriv ett PHP-skript som låter användaren logga in med sitt användarnamn och lösenord. Hämta både användarnamn och lösenord i databasen. Lösenordet kan vara sparat i klartext.

$username = "Ludvig";
$password = "321";

// Hämta användaren från databasen
$query = "SELECT * FROM users WHERE name = :username";
$stmt = $conn->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->execute();
$user = $stmt->fetch();

if ($user && $user['password'] === $password) {
    //$_SESSION['username'] = $username;
    
    echo "Inloggad som " . $username;
} else {
    echo "Fel användarnamn eller lösenord.";
}



?>
</div>

<div class="grid-item">
Övning 12:<h2>SessionShredder</h2>
<?php
//Skapa ett PHP-skript som tar bort all sessionsdata, men behåller sessionen. Till exempel för att tömma en varukorg.


//session_unset();
print_r($_SESSION);

if (isset($_GET['destroySession'])) {
    // Destroy the session
    session_destroy();
    echo "yes";
    // Redirect to another page after logging out
    //header("Location: index.php");
    //exit();
}


?>
<br>
<a href="week4pages/destroySessionData.php">Destroy Sessions</a>
<br>
<a href="?destroySession=true">Destroy Session without redirect </a>


</div>

<div class="grid-item">
Övning 13:<h2>ClassifiedAccess</h2> 
<?php
//Skriv ett PHP-skript där bara en viss användare kan logga in (skapa en session) och se en skyddad sida. Kontrollera om användaren är inloggad innan sidan visas, annars skicka tillbaka användaren till övningarna.
//På den skyddade sidan, visa alla användaruppgifter för alla användare

$_SESSION['username'] = "admin";

?>
<a href="week4pages/admin.php">Admin Page</a>

</div>

<div class="grid-item">
Övning 14:<h2>RegUserLoginUser</h2>
<?php
//Skriv ett registrerings script för en hemsida. Spara ny användare i databasen, gör sedan ett inloggningsförsök där användarnamn och lösenord kontrolleras. Om en ny användare skapas och allting stämmer, logga in användaren med sessions.

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$username = $_POST['username'];
$password = $_POST['password'];


$query = "SELECT * FROM users WHERE name = :username";
$stmt = $conn->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "Användaren finns redan.";
} else {

    $query = "INSERT INTO users (name, password) VALUES (:username, :password)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $_SESSION['username'] = $username;
    echo "<br>Användare registrerad och inloggad!";
}
}



?>


<form method="POST">
    <label for="username">Användarnamn:</label><br>
    <input type="text" name="username" required><br><br>

    <label for="password">Lösenord:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Registrera och logga in</button>
</form>


</div>

</div>
</body>
</html>
