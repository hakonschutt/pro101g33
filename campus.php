<?php 

require 'core/init.php'; 
echo Init::header();

require_once 'core/header.php';

$error = null;
$id = null;

if (!isset($_GET['id']) && !is_numeric($_GET['id'])) {
	$error = "You need to pass an ID";
} else {
	$id = $_GET['id'];
}

//echo $id; 


/*if ($error === null){
	// Starter queryen.

	$query = "SELECT * FROM campus WHERE campus_id = :id";
	$sql = $database->prepare("$query;");

	$sql->bindParam(':id', $id, PDO::PARAM_INT);

	$sql->setFetchMode(PDO::FETCH_OBJ);
	$sql->execute();

	// Kjører en loop for hvert element i som PDO henter.
	while ($element = $sql->fetch()) {
	    echo '
	        <a href="campus.php?id=' . $element->campus_id . '">
	            <div id="campus campus' . $element->campus_id . '">
	                <img class="campus--icon" src="' . $element->bilde_path . '"/>
	                <span class="campusn--ame">' . $element->navn . '</span>
	            </div>
	        </a>
	    ';
	}
}*/

echo '<div class="activities">';
	echo '<div class="activities-inner">';
	// Starter queryen.
	    $query = "SELECT * FROM type";
	    $sql = $database->prepare("$query;");
	    $sql->setFetchMode(PDO::FETCH_OBJ);
	    $sql->execute();

	    // Kjører en loop for hvert element i som PDO henter.
	    while ($element = $sql->fetch()) {
	    	echo'
		    	<a href="#">
		            <div class="activity" id="activity' . $element->type_id . '">
		                <img class="activity-icon" src="' . $element->bilde_path . '"/>
		                <span class="activity-name">' . $element->type_navn . '</span>
		            </div>
		        </a>
	        ';
	    }

	echo '</div>';
echo '</div>';

/***************************************/
/*	Room for rest of activity post
/*
/***************************************/

?>
<div class="info">
	<div class="info--inner">
		<div class="info--inner-left">
	

		</div>
		<div class="info--inner-right">
		

		</div>
	</div>
</div>



<?php
require_once 'core/footer.php';

echo Init::footer(); 








