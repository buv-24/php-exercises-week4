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

?>
</div>


<div class="grid-item">
Övning 2:<h2>TableCreator</h2> 
<?php
//Skapa en tabell manuellt med PHPmyadmin som heter users, med kolumnerna id och name, och email. Checka i rutan AI (auto increment) vid id kolumnen.
//Lägg till en användare med valfritt namn via PHPMyAdmin.
//Hämta alla användare med hjälp av PHP.

?>
</div>

<div class="grid-item">
Övning 3:<h2>SELECT*</h2>
<?php
//Skriv ett PHP-skript för att hämta alla användare med ett specifikt namn och visa dem i en lista.


?>
</div>

<div class="grid-item">
Övning 4:<h2>UpdateSession</h2> 
<?php
//Skriv ett PHP-script som startar en session och visar ett meddelande om att sessionen har startats.
//Skapa ett script för att uppdatera en session-variabel (t.ex. ändra användarnamn eller e-postadress) och visa den uppdaterade informationen.
?>
</div>

<div class="grid-item">
Övning 5:<h2>CheckIfEmailExists</h2>
<?php 
//Skriv ett PHP-skript för att kontrollera om en e-postadress redan finns i databasen innan en ny användare infogas. Visa ett meddelande om e-postadressen redan finns.
?>
</div>

<div class="grid-item">
Övning 6:<h2>SQLSearch</h2>
<?php
//Skriv ett PHP-skript för att söka efter användare vars namn innehåller ett specifikt ord (använd LIKE i SQL) och visa resultaten.
?>
</div>
<div class="grid-item">
Övning 7:<h2>GetById</h2>
<?php
//Skriv en PHP-funktion som tar en användares id som parameter och returnerar deras information från users-tabellen. Använd funktionen för att visa en specifik användare på en sida.
?>
</div>

<div class="grid-item">
Övning 8:<h2>UpdateForm</h2>
<?php
//Skriv ett PHP-skript som hämtar en användares information från databasen baserat på deras id och visar den i ett HTML-formulär så att användaren kan uppdatera sin data. Uppdatering behöver inte vara möjlig.
?>
</div>

<div class="grid-item">
Övning 9:<h2>WebbshopVarukorg</h2>
<?php
//Skriv ett PHP-skript som simulerar en varukorg. När sidan uppdateras, ska produkten sparas i en session. Visa varukorgens innehåll på en annan sida. Nedan finns en länk till den andra sidan.

?>
<a href="week4pages/otherPage.php">Link to other page</a>
</div>

<div class="grid-item">
Övning 10:<h2>SelectSessionValue</h2> 
<?php
//Skriv ett PHP-skript som använder en dropdown list med en submit knapp för att välja värdet på en session. Detta värde kommer att sparas efter refresh av sidan eftersom det ligger i en session.

?>
</div>

<div class="grid-item">
Övning 11:<h2>LoginThroughDatabase</h2>
<?php
//Skriv ett PHP-skript som låter användaren logga in med sitt användarnamn och lösenord. Hämta både användarnamn och lösenord i databasen. Lösenordet kan vara sparat i klartext.
?>
</div>

<div class="grid-item">
Övning 12:<h2>SessionShredder</h2>
<?php
//Skapa ett PHP-skript som tar bort all sessionsdata, men behåller sessionen. Till exempel för att tömma en varukorg.
?>
<a href="week4pages/destroySessionData.php">Destroy Sessions</a>

</div>

<div class="grid-item">
Övning 13:<h2>ClassifiedAccess</h2> 
<?php
//Skriv ett PHP-skript där bara en viss användare kan logga in (skapa en session) och se en skyddad sida. Kontrollera om användaren är inloggad innan sidan visas, annars skicka tillbaka användaren till övningarna.
//På den skyddade sidan, visa alla användaruppgifter för alla användare

?>
<a href="week4pages/admin.php">Admin Page</a>

</div>

<div class="grid-item">
Övning 14:<h2>RegUserLoginUser</h2>
<?php
//Skriv ett registrerings script för en hemsida. Spara ny användare i databasen, gör sedan ett inloggningsförsök där användarnamn och lösenord kontrolleras. Om en ny användare skapas och allting stämmer, logga in användaren med sessions.


?>
</div>

</div>
</body>
</html>
