<?php 

if (isset($_GET['by_id']) && !empty($_GET['by_id'])){
	$by_id = $_GET['by_id'];
} else {
	http_response_code(404);
}

$channelsApi = 'https://oslobysykkel.no/api/v1/stations/availability';
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

$data = json_decode($response, true)['stations'];

$station = null;

foreach ($data as $tempStation) {
	if ($station === null && $tempStation['id'] == $by_id) {
		$station = $tempStation['availability'];

		echo '
				<div class="bysykkel-lock">
					<img class="bysykkel-lock-img" src="img/icons/lock.png" />
					<span>' . $station['locks'] . '</span>
				</div>
				<div class="bysykkel-bikes">
					<img class="bysykkel-bikes-img" src="img/icons/bicycle.png" />
					<span>' . $station['bikes'] . '</span>
				</div>
			';
	}
}