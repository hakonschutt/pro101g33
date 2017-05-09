<?php
    require 'core/init.php';
    echo Init::header();
?>

<body class="indexbody" style="background-image: url('img/LargePic/Background.png');">
    <div class="main-container">
        <div class="left-col">
            <div class="left-col-inner">
                <img class="left-col-inner-logo" src="img/westerdals-hvit.png">
                <p class="left-col-inner-text">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.</p>
            </div>
        </div>
        <!--<hr clasS="middle-line">-->
        <div class="right-col">
            <h1 class="campus-title">Velg Campus</h1>
            <div id="campuses">
            	<?php 
                    
                    // Starter queryen.
                    $query = "SELECT * FROM campus";
                    $sql = $database->prepare("$query;");
                    $sql->setFetchMode(PDO::FETCH_OBJ);
                    $sql->execute();

                    // Kjører en loop for hvert element i som PDO henter.
                    while ($element = $sql->fetch()) {
                        echo '
                            <a href="campus.php?id=' . $element->campus_id . '">
                                <div class="campus" id="campus' . $element->campus_id . '">
                                    <img class="campus-icon" src="' . $element->bilde_path . '"/>
                                    <span class="campus-name">' . $element->navn . '</span>
                                    <img class="campus-arrow" src="img/arrow-icon.png"/>
                                </div>
                            </a>
                        ';
                    }
                ?>
            </div>
        </div>
    </div>

<?php
    echo Init::footer();
?>