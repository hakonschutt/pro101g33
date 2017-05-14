<?php 

$ruter_id = 3010320;

$ruter_url = 'https://hjelvik.net/spotOn/proxy_v3.php?stop=' . $ruter_id;
    $ruter_json = file_get_contents($ruter_url);
    $ruter_array = json_decode($ruter_json, true);


    foreach ($ruter_array as $departure) {

    	$tempArrival = strtotime($departure['MonitoredCall']['ExpectedArrivalTime']);
    	$deff = $tempArrival - time();

		// date("d.m.Y H:i:s", $tempArrival)

		$tempMinutes = round($deff / 60, 0);

		$LineRef = $departure['LineRef'];
		$DesName = $departure['DestinationName'];
		$minutes = ($tempMinutes == 0 ? "Nå" : $tempMinutes . " min");

		echo '
				<div class="dropdown-inner-rep">
					<div class="dropdown-inner-rep-inner">
						<p>' . $LineRef . ' ' .  $DesName . '</p>
						<span>' . $minutes . '</span>
					</div>
				</div>
			';
    }