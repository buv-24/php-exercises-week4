<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php



// Kontrollera om användaren är inloggad och har rätt behörighet
if ($_SESSION['username'] == 'admin') {
    echo "Välkommen till den skyddade sidan!";

}else{
    header('Location: ../php-exercises-week4.php'); 
    exit;

}

// Visa skyddad sida
?>




</body>
</html>