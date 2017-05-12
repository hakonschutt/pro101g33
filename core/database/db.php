<?php

    $host = "127.0.0.1:8889";
    $db = "campus";
    $bruker = "root";
    $pass = "root";

    // Prøv å koble til databasen. Hvis problem oppstår, gi en feilmelding til bruker.
    try {
        $database = new PDO("mysql:host=$host;dbname=$db", "$bruker", "$pass");
        $database -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Beklager, det oppstod et problem med databasen. Gi beskjed til administrasjonen";
        exit();
    } 
?>
