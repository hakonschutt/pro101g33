<?php
    require 'core/init.php';
    echo Init::header();
?>

<body class="indexbody" style="background-image: url('img/LargePic/Background.png');">
    <div class="main-container">
        <div class="left-col">
            <div class="left-col-inner">
                <img class="left-col-inner-logo" src="img/westerdals-hvit.png">
                <p class="left-col-inner-text">Er du ny på Westerdals ? Eller bare lyst til å se hva som finnes av tilbud i nærområdet ? Da har du kommet til riktig sted. @Campus gir deg enkelt muligheten til å finne steder av interesse. </br></br> I nærområdet til campus Fjerdingen, Vulkan og brenneriveien finner du blant annet spisesteder, utesteder, transportmuligheter og fritidsaktiviteter. Er du nyskjerrig så velg campus og sett gang.</p>
            </div>
        </div>
        <div class="right-col">
            <div id="campuses">
                <h1 class="campus-title">Velg Campus</h1>
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