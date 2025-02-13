<?php
session_start();

// Kolla ifall användaren är inloggad, annars skicka till login-sidan
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Lösenordet är 123 för demonstration
$valid_password = '123';

// Hantera inloggning
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kolla ifall lösenordet är sant
    if ($password == $valid_password) {
        $_SESSION['username'] = $username;  // Skapa sessionsvariabel för användarnamn
        header("Location: index.php");  // Skicka vidare till index.php
        exit();
    } else {
        $error_message = "Invalid password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login Page</h1>

    <?php
    //Visa felmeddelande vid fel
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>

    <!-- POST-formulmär används för inloggning -->
    <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
