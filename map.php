<?php 
require 'core/init.php'; 
echo Init::header();

require_once 'core/header.php';

$error = null;
$id = null;
$data_id = null; 
$locations = array();

if (!isset($_GET['id']) && !is_numeric($_GET['id'])) {
	$error = "You need to pass an ID";
} else {
	$id = $_GET['id'];
}

if (isset($_GET['data_id']) && is_numeric($_GET['data_id'])) {
    $data_id = $_GET['data_id'];
} else {
    $data_id = null;
}



$dom = new DomDocument('1.0', 'UTF-8');
$dom->formatOutput=true;

$data = $dom->createElement("data");
$data->setAttribute("id", $id);
$data->setAttribute("data_id", $data_id);
$dom->appendChild($data);

if ($error === null){
	// Starter queryen.

    
    $query = "SELECT * FROM data WHERE campus_id = '$id'";
    
    
	$sql = $database->prepare("$query;");

	$sql->setFetchMode(PDO::FETCH_ASSOC);
	$sql->execute();
    
    $elements = $sql->fetchAll();
    
    
    foreach($elements as $loc) {
        $location = $dom->createElement("location");
        $data->appendChild($location);
        
        $loc_id=$dom->createElement("id",$loc['id']);
        $location->appendChild($loc_id);
        
        $name=$dom->createElement("name",($loc['navn']));
        $location->appendChild($name);
        
        $lat=$dom->createElement("lat",$loc['latitude']);
        $location->appendChild($lat);
        
        $lng=$dom->createElement("lng",$loc['longitude']);
        $location->appendChild($lng);
        
        $type=$dom->createElement("type",$loc['type_id']);
        $location->appendChild($type);
        
        $address=$dom->createElement("address",($loc['adresse']));
        $location->appendChild($address);
        
        $time=$dom->createElement("time",$loc['reisetid']);
        $location->appendChild($time);

        $aapning=$dom->createElement("aapning",($loc['aapningstid']));
        $location->appendChild($aapning);
        
    }
    $dom->save("assets/xml/map_locations.xml") or die("couldnt make file!");
    
}
?>
<div class="mapcontainer">
    <div class="mapcontainer-inner">
        <div class="mapcontainer-inner-map">
            <form>
                <p>Filter</p>
                <div>
                    <label>
                        <input type="radio" name="a" value="all" onclick="filterMarkersByType(this.value);" checked>
                        <img title="Filtrer etter alt" src="img/icons/icon.png" alt="westerdals logo">
                    </label>
                    <label>
                        <input type="radio" name="a" value=1 onclick="filterMarkersByType(this.value);">
                        <img title="Filtrer etter bysykkel" src="img/aktivitet/bicycle.png" alt="blå sykkel">
                    </label>
                    <label>
                        <input type="radio" name="a" value=2 onclick="filterMarkersByType(this.value);">
                        <img title="Filtrer etter transport" src="img/aktivitet/front-of-bus.png" alt="blå buss">
                    </label>
                    <label>
                        <input type="radio" name="a" value=3 onclick="filterMarkersByType(this.value);">
                        <img title="Filtrer etter matbutikker" src="img/aktivitet/shopping-cart.png" alt="blå handle vogn">
                    </label>
                    <label>
                        <input type="radio" name="a" value=4 onclick="filterMarkersByType(this.value);">
                        <img title="Filtrer etter spisesteder" src="img/aktivitet/2food.png" alt="blå kniv og gaffel">
                    </label>
                    <label>
                        <input type="radio" name="a" value=5 onclick="filterMarkersByType(this.value);">
                        <img title="Filtrer etter utesteder" src="img/aktivitet/food.png" alt="blå cocktail">
                    </label>
                    <label>
                        <input type="radio" name="a" value=6 onclick="filterMarkersByType(this.value);">
                        <img title="Filtrer etter fritidsaktiviteter" src="img/aktivitet/puzzle.png" alt="blått puslespill">
                    </label>
                </div>
            </form>
            <div class="map"><div id="campusmap"></div></div>
            <div class="markerinfo" id="marker">
                <div class="markerinfo-title" id="markertitle"></div>
                <div class="markerinfo-content" id="markercontent"></div>
            </div>
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-eHlKwovIr9zf4zPpvNlaDazU5OKWeKk"></script>
<script src="assets/js/gmapscript.js"></script>



<?php
    require_once 'core/footer.php';
    echo Init::footer(); 
?>
