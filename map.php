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


if ($error === null){
	// Starter queryen.

	$query = "SELECT * FROM campus WHERE campus_id = :id";
	$sql = $database->prepare("$query;");

	$sql->bindParam(':id', $id, PDO::PARAM_INT);

	$sql->setFetchMode(PDO::FETCH_OBJ);
	$sql->execute();

	// Kjører en loop for hvert element i som PDO henter.
	while ($element = $sql->fetch()) {
	   /* echo '
	        <a href="campus.php?id=' . $element->campus_id . '">
	            <div id="campus campus' . $element->campus_id . '">
	                <img class="campus--icon" src="' . $element->bilde_path . '"/>
	                <span class="campusn--ame">' . $element->navn . '</span>
	            </div>
	        </a>
	    ';*/
	}
}

/***************************************/
/*	Room for rest of activity post
/*
/***************************************/
?>

<div class="mapcontainer">
    <div class="map" id="campusmap" style="width:50%;height:400px;"></div>
    <form>
        <div>
            <input type="radio" name="a" value="all" onclick="filterMarkersByType(this.value);" checked>
            <input type="radio" name="a" value="transport" onclick="filterMarkersByType(this.value);">
            <input type="radio" name="a" value="matbutikker" onclick="filterMarkersByType(this.value);">
        </div>
    </form>
    <div class="markerinfo" id="markercontent"></div>
</div>


<script type"text/javascript">var _CAMPUS_ID = "<?= $id; ?>";</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-eHlKwovIr9zf4zPpvNlaDazU5OKWeKk"></script>
<script src="assets/js/gmapscript.js"></script>
    
<?php
    require_once 'core/footer.php';
    echo Init::footer(); 
?>
