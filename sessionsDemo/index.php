<?php
session_start();

// Kolla ifall användaren är inloggad, annars skicka till login-sidan
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <p>You are now logged in.</p>
    
    <p>
    <a href="profile.php">Profile page</a> | <a href="logout.php">Logout</a> 
</body>
</html>
