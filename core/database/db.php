<?php
    $host = "localhost";
    $db = "###";
    $bruker = "root";
    $pass = "root";

    // Trying to connect to the databse. If a problem occures, gi the follow custom message to the user. 
    try {
        $database = new PDO("mysql:host=$host;dbname=$db", "$bruker", "$pass");
        $database -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Beklager, det oppstod et problem med databasen. Gi beskjed til administr$
        exit();
    }
?>
