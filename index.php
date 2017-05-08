</DOCTYPE html>
<html lang="no">
    <head>
        <meta charset="utf-8" />
        <meta name="author" content="Gruppe 36 - PJ2100">
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
		<link rel="shortcut icon" href="img/icon.png" type="image/x-icon" />
        <link rel="stylesheet" href="css/style.css" type="text/css" />

        <!-- Bruker PHP for å hente tittelen på gjeldende side -->
        <title>@Campus</title>
</head>
<body>
    <div class="main-container" style="background-image: url('img/LargePic/Background.png');">
        <div class="main-container-inner">
            <div class="left-col">
                <img class="left-col-logo" src="img/westerdals-hvit.png">
                <p class="left-col-text">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.</p>
            </div>
            <div class="right-col">
                <h1 class="campus-title">Velg Campus</h1>
                <div id="campuses">
                	<?php 
                        require 'core/init.php'; 
                        // Starter queryen.
                        $query = "SELECT * FROM campus";
                        $sql = $database->prepare("$query;");
                        $sql->setFetchMode(PDO::FETCH_OBJ);
                        $sql->execute();

                        // Kjører en loop for hvert element i som PDO henter.
                        while ($element = $sql->fetch()) {
                            echo '
                                <div id="campus campus' . $element->campus_id . '">
                                    <img class="campus--icon" src="' . $element->bilde_path . '"/>
                                    <span class="campusn--ame">' . $element->navn . '</span>
                                </div>
                            ';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
