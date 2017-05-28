<?php 
	$error = null;
	$id = null;

	if (!isset($_GET['id']) && !is_numeric($_GET['id'])) {
		$error = "You need to pass an ID";
	} else {
		$id = $_GET['id'];
	}
?>

<body class="mainbody">
	<div class="nav">
	    <div class="nav-bar">
	    <?php
	    	// Starter queryen.
            $query = "
            	SELECT * FROM campus
            	WHERE id = '$id'
            	";

            $sql = $database->prepare("$query;");
            $sql->setFetchMode(PDO::FETCH_OBJ);
            $sql->execute();

            // Kjører en loop for hvert element i som PDO henter.
            while ($element = $sql->fetch()) {
                echo '
                        <a title="Tilbake til hovedsiden" href="index.php">
                            <div class="nav-bar-campus" id="campus' . $element->id . '">
                            	<img class="nav-bar-campus-icon" src="' . $element->campus_bilde_path . '" alt="rundt bilde av campus ' . $element->navn . '"/>
                            	<span class="nav-bar-campus-initial">@' . $element->navn . '</span>
                            	<span class="nav-bar-campus-navn">@Campus - ' . $element->navn . '</span>
                            </div>
                        </a>
                    ';
            }?>
    		<!--<a href="index.php"><img class="nav-bar-logo" src="img/westerdals-hvit.png" /></a>-->
	    	<a title="Åpne navigasjonsmeny" id="nav-icon" href="#"><div tabindex="0" id="nav-icon" style="float: right; margin: 20px;">
			  <span></span>
			  <span></span>
			  <span></span>
			  <span></span>
			</div></a>
	    </div>
	</div>
	<a href="#"><div id="opacity"></div></a>
	<div class="menu" id="menu">
		<div class="menu-inner">
			<ul class="menu-inner-items" id="navmenu">
				<a tabindex="-1" href="index.php"><li class="menu-inner-items-item">Hjem</li></a>
				<a tabindex="-1" href="<?php echo 'campus.php?id=' . $id . '#Aktiviteter'?>"><li class="menu-inner-items-item">Aktiviteter</li></a>
				<a tabindex="-1" href="<?php echo 'campus.php?id=' . $id . '#Omoss'?>"><li class="menu-inner-items-item">Om oss</li></a>
				<a tabindex="-1" href="<?php echo 'campus.php?id=' . $id . '#Kontaktoss'?>"><li class="menu-inner-items-item">Kontakt oss</li></a>
				<a href="<?php echo 'map.php?id=' . $id ?>"><li class="menu-inner-items-item" id="map">Kart oversikt</li></a>
			</ul>
			<div class="menu-inner-campuses">
                <h1 class="menu-inner-campuses-title">Velg Campus</h1>
            	<?php 
                    // Starter queryen.
                    $query = "SELECT * FROM campus";
                    $sql = $database->prepare("$query;");
                    $sql->setFetchMode(PDO::FETCH_OBJ);
                    $sql->execute();

                    // Kjører en loop for hvert element i som PDO henter.
                    while ($element = $sql->fetch()) {
                        if ($element->id === $id){
                        	$class = 'active';
                        } else {
                        	$class = '';
                        }

                        echo '
	                            <a href="campus.php?id=' . $element->id . '">
	                                <div class="menu-inner-campuses-campus" id="campus' . $element->id . '">
	                                    <img class="menu-inner-campuses-campus-icon" src="' . $element->campus_bilde_path . '" alt="rundt bilde av campus ' . $element->navn . '"/>
	                                    <span class="menu-inner-campuses-campus-name ' . $class . '">' . substr($element->navn,0,1) . '</span>
	                                </div>
	                            </a>
	                        ';
                    }
                ?>
            </div>
		</div>
	</div>
