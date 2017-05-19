<?php 
require 'core/init.php'; 
echo Init::header();

require_once 'core/header.php';

$error = null;
$id = null;
$locations = array();

if (!isset($_GET['id']) && !is_numeric($_GET['id'])) {
	$error = "You need to pass an ID";
} else {
	$id = $_GET['id'];
}

$dom = new DomDocument('1.0', 'utf-8');
$dom->formatOutput=true;

$data = $dom->createElement("data");
$data->setAttribute("id", $id);
$dom->appendChild($data);

if ($error === null){
	// Starter queryen.
    
	$query = "SELECT navn, latitude, longitude, type_id, adresse, reisetid FROM data WHERE campus_id = '$id'";
	$sql = $database->prepare("$query;");

	$sql->setFetchMode(PDO::FETCH_ASSOC);
	$sql->execute();
    
    $elements = $sql->fetchAll();
    
    
    foreach($elements as $loc) {
        $location = $dom->createElement("location");
        $data->appendChild($location);
        
        $name=$dom->createElement("name",utf8_encode($loc['navn']));
        $location->appendChild($name);
        
        $lat=$dom->createElement("lat",$loc['latitude']);
        $location->appendChild($lat);
        
        $lng=$dom->createElement("lng",$loc['longitude']);
        $location->appendChild($lng);
        
        $type=$dom->createElement("type",$loc['type_id']);
        $location->appendChild($type);
        
        $address=$dom->createElement("address",utf8_encode($loc['adresse']));
        $location->appendChild($address);
        
        $time=$dom->createElement("time",$loc['reisetid']);
        $location->appendChild($time);
        
        
    }
    $dom->save("./assets/xml/map_locations.xml") or die("couldnt make file!");
    
}

/***************************************/
/*	Room for rest of activity post
/*
/***************************************/
?>
<input type="hidden" id="juksediv" value="<?php echo $id ?>" />
<div class="mapcontainer">
    <form>
        <div>
            <label>
                <input type="radio" name="a" value="all" onclick="filterMarkersByType(this.value);" checked>
                <img src="img/icons/icon.png">
            </label>
            <label>
                <input type="radio" name="a" value=1 onclick="filterMarkersByType(this.value);">
                <img src="img/aktivitet/bicycle.png">
            </label>
            <label>
                <input type="radio" name="a" value=2 onclick="filterMarkersByType(this.value);">
                <img src="img/aktivitet/front-of-bus.png">
            </label>
            <label>
                <input type="radio" name="a" value=3 onclick="filterMarkersByType(this.value);">
                <img src="img/aktivitet/shopping-cart.png">
            </label>
            <label>
                <input type="radio" name="a" value=4 onclick="filterMarkersByType(this.value);">
                <img src="img/aktivitet/2food.png">
            </label>
            <label>
                <input type="radio" name="a" value=5 onclick="filterMarkersByType(this.value);">
                <img src="img/aktivitet/food.png">
            </label>
            <label>
                <input type="radio" name="a" value=6 onclick="filterMarkersByType(this.value);">
                <img src="img/aktivitet/puzzle.png">
            </label>
        </div>
    </form>
    <div class="map"><div id="campusmap" style="width:100%;height:550px;"></div></div>
    <div class="markerinfo">
        <div class="markerinfo-title" id="markertitle"></div>
        <div class="markerinfo-content" id="markercontent"></div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-eHlKwovIr9zf4zPpvNlaDazU5OKWeKk"></script>
<script src="assets/js/gmapscript.js"></script>



<?php
    require_once 'core/footer.php';
    echo Init::footer(); 
?>
