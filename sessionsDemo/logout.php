<?php
session_start();

// Både ta bort all data, och sedan stänga ner sessionen
session_unset();
session_destroy();

// Skicka tillbaka till login
header("Location: login.php");
exit();
?>
