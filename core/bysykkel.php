<?php 

$by_id = 210;

function getStations() {
    return json_decode(runUrl("https://oslobysykkel.no/api/v1/stations"), true);
} // End getDeparturesByStop

function getAvailability() {
    return json_decode(runUrl("https://oslobysykkel.no/api/v1/stations/availability"), true);
} // End getDeparturesByList

function runUrl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, "Client-Identifier: d1a8d9b87607f4bd4ea54957557d39d6");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);

    echo '<pre>';
    print_r($result);
    echo '</pre>';

    curl_close($ch);
    return $result;
} // End runUrl


	$channelsApi = 'https://oslobysykkel.no/api/v1/';
	$clientId = 'd1a8d9b87607f4bd4ea54957557d39d6';
	$ch = curl_init();

	curl_setopt_array($ch, array(
	CURLOPT_HTTPHEADER => array(
	   'Client-Identifier: ' . $clientId
	),
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_URL => $channelsApi
	));

	$response = curl_exec($ch);
	curl_close($ch);

