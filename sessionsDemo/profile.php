<?php
// Start the session
session_start();

// Kolla ifall inloggad
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Exempel data från en array
$user_info = [
    'Username' => $_SESSION['username'],
    'Email' => 'user@example.com',
    'Member since' => '2025-02-12',
    'Role' => 'Member'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <h1>User Profile</h1>
    <p>Welcome to your profile page, <?php echo $_SESSION['username']; ?>!</p>

    <h2>Profile Details</h2>
    <ul>
        <?php
        // Visa lite påhittad användardata
        foreach ($user_info as $key => $value) {
            echo "<li><strong>$key:</strong> $value</li>";
        }
        ?>
    </ul>

    <a href="index.php">Go to Welcome Page</a> | 
    <a href="logout.php">Logout</a>
</body>
</html>
