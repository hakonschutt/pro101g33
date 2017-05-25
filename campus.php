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

/* if ($error === null){
	// Starter queryen.

	$query = "SELECT * FROM campus WHERE campus_id = :id";
	$sql = $database->prepare("$query;");

	$sql->bindParam(':id', $id, PDO::PARAM_INT);

	$sql->setFetchMode(PDO::FETCH_OBJ);
	$sql->execute();

	// Kjører en loop for hvert element i som PDO henter.
	while ($element = $sql->fetch()) {
	    echo '
	        <!--<a href="campus.php?id=' . $element->campus_id . '">
	            <div id="campus campus' . $element->campus_id . '">
	                <img class="campus--icon" src="' . $element->bilde_path . '"/>
	                <span class="campusn--ame">' . $element->navn . '</span>
	            </div>
	        </a>-->
	    ';
	}
}*/
?>
<div class="activities" id="Aktiviteter">
	<div onclick="start('.act'); return false;" class="activities-inner">
	<?php
	// Starter queryen.
	    $query = "
	    	SELECT * FROM type
	    ";
	    $sql = $database->prepare("$query;");
	    $sql->setFetchMode(PDO::FETCH_OBJ);
	    $sql->execute();

	// Kjører en loop for hvert element i som PDO henter.
	    while ($element = $sql->fetch()) {
	    	echo'
		    	<a class="tester">
		            <div onclick="on(\'#act-div' . $element->id  . '\'); return false;" class="activity" id="activity' . $element->id . '">
		                <img class="activity-icon" src="' . $element->type_bilde_path . '"/>
		                <span class="activity-name">' . $element->type_navn . '</span>
		            </div>
		        </a>
	        ';
	    }?>
	</div>
</div>
<div class="act stopp" id="act">
	<div class="act-div inaktiv-d">
		<?php
		// Starter queryen.
			$query = "
				SELECT * FROM type
			";
		    $sql = $database->prepare("$query;");
		    $sql->setFetchMode(PDO::FETCH_OBJ);
		    $sql->execute();

		    $result = $sql->fetchAll(PDO::FETCH_OBJ);

		    //echo '<pre>' . print_r($result, true) . '</pre>';

		// Kjører en loop for hvert element i som PDO henter. &id
			foreach ($result as $element) {
				$type_id = $element->id;

				//echo '<pre>' . print_r($element, true) . '</pre>';

				echo'
					<div class="act-div-inner act-div' . $element->id . ' off" id="act-div' . $element->id . '">
						<div class="act-div-inner-left">
							<h3 class="act-div-inner-left-header">' . $element->type_navn . '</h3>
							<img class"act-div-inner-left-icon" src="' . $element->type_bilde_path . '" />
							<p class="act-div-inner-left-des">' . $element->type_beskrivelse . '</p>
						</div>
						<div class="act-div-inner-right">';
						
						// Starter queryen.
							$query = "
								SELECT * FROM data
								WHERE campus_id = '$id' AND type_id = '$type_id'
							";
						    $sql = $database->prepare("$query;");
						    $sql->setFetchMode(PDO::FETCH_OBJ);
						    $sql->execute();

						    $rows = $sql->fetchAll(PDO::FETCH_OBJ);

							foreach ($rows as $row) {

								echo '
									<div class="act-div-inner-right-box">
										<div id="aktivitet' . $row->id  . '" class="act-div-inner-right-box-inner inaktiv">
			                				<div onclick="aapne(\'#aktivitet' . $row->id  . '\'); return false;" 	class="act-div-inner-right-box-inner-wrap CallWrapper">
												<h3 class="act-div-inner-right-box-name">' . $row->navn . '</h3>
												<div class="act-div-inner-right-box-right">
													<p class="act-div-inner-right-box-right-reisetid">Reisetid: ' . $row->reisetid . 'min</p>
													<p class="act-div-inner-right-box-right-les">Les mer</p>
												</div>
											</div>
											<div class="act-div-inner-right-box-drop dropdown">
												<div class="dropdown-inner">';
												/*for ($type_id = 1; $type_id <= 2; $type_id++) {
												    echo '
														Hello
													';
												} 

												for ($type_id = 3; $type_id <= 6; $type_id++) {
													echo '
														<div class="dropdown-inner-left">
															<p>Adresse: </p>
															<span>' . $row->adresse . '</span>
															</br>
															<p>Beskrivelse: </p>
															<span>' . $row->beskrivelse . '</span>
														</div>
														<img class="dropdown-inner-image" src="' . $row->bilde_path . '">
													';
												}*/
												if ($row->type_id <= 1){
													$by_id = $row->x_id;

													echo '
															<div class="dropdown-inner-left">
																<p>' . $row->beskrivelse . '</p>
																</br>
																<p>Åpningstid: </p>
																<span>' . $row->aapningstid . '</span>
																</br>
																</br>
																<p>Tilgjenglighet: </p>
																<div class="dropdown-inner-rep byLoader" data-api-path="/core/bysykkel.php?by_id=' . $by_id . '">
																</div>
															</div>
															<div class="dropdown-inner-image" style="background-image: url(' . $row->bilde_path . '); background-position: center;"></div>
														';

												} else if ($row->type_id == 2){
													$ruter_id = $row->x_id;

													echo '<div class="dropdown-inner-rep stopLoader" data-api-path="/core/ruter.php?stop=' . $ruter_id . '">';
													echo '</div>';

												} else { 
													echo '
														<div class="dropdown-inner-left">
															<p>Adresse: </p>
															<span>' . $row->adresse . '</span>
															</br>
															<p>Beskrivelse: </p>
															<span>' . $row->beskrivelse . '</span>
														</div>
														<div class="dropdown-inner-image" style="background-image: url(' . $row->bilde_path . '); background-position: center;"></div>
														';
												}
												echo '</div>
											</div>
										</div>
									</div>
								';
							}
					echo '</div>
				    </div>';
			}?>
	</div>
</div>
<div class="info" id="Omoss">
	<div class="info-inner">
		<div class="info-inner-left">
			<div class="info-inner-left-topwrap">
				<h1>Hva er @Campus</h1>
				<p>@Campus er vårt bidrag til å hjelpe nye og gamle studenter på Westerdals til å bli kjent med nærmiljøet rundt campusene. Her vil du kunne finne informasjon om tilbud som befinner seg nært campus og hvor de forskjellige tilbudene befinner seg. Du kan finne alt fra de nærmeste matbutikkene til utestedene som befinner seg i nærheten. </p>
			</div>
			<div class="info-inner-left-bottomwrap">
				<h1>Hvorfor bruker vi det?</h1>
				<p>Ja, hvorfor skal du bruke @Campus. Vi vil at studenter og andre som er på Westerdals sine campuser skal vite hvilke tilbud som befinner seg i nærområdet. Ved å bruke @Campus skal du kunne finne nettopp dette. Ved hjelp av denne siden skal du kunne finne frem til alt som er i nærmiljøet til campusene. Vi ønsker rett og slett å gjøre hverdagen enklere for alle som benytter seg av Westerdals sine campuser. </p>
				<p>@Campus er ditt hjelpemiddel til å få den beste opplevelsen når du befinner deg på campus.</p>
			</div>
		</div>
		<div class="info-inner-right">
			<img class="info-inner-right-image" src="img/LargePic/image1.jpg" />
			<img class="info-inner-right-image" src="img/LargePic/image2.jpg" />
			<img class="info-inner-right-image" src="img/LargePic/image3.jpg" />
		</div>
	</div>
</div>

<div class="contact" id="Kontaktoss" style="background-image: url('img/LargePic/Background.png');">
	<div class="contact-inner">
		<h1 class="contact-inner-header">Kontakt oss</h1>
		<div class="contact-inner-left">
			<img class="contact-inner-left-image" src="img/LargePic/map.png" />
			<div class="contact-inner-left-info">
				<div class="contact-inner-left-info-bit">
					<img src="img/icons/pin.png" />
					<p style="bottom: 12px;">Chr. Krohgs gate 32, </br>0186 Oslo</p>
				</div>
				<div class="contact-inner-left-info-bit">
					<img src="img/icons/mail.png" />
					<p>post@westerdals.no</p>
				</div>
				<div class="contact-inner-left-info-bit">
					<img src="img/icons/phone.png" />
					<p>22 05 75 50</p>
				</div>	
			</div>
		</div>
		<div class="contact-inner-right">
			<div class="contact-inner-right-wrap">
				<form method="post" id="contactForm" action="core/contactaction.php">
					<input required type="text" name="Name" id="Name" placeholder="Navn"/>
		
					<input required type="email" name="Email" id="Email" placeholder="Email"/>
					
					<textarea required name="Message" rows="20" cols="20" id="Message" placeholder="Melding"></textarea>

					<input type="submit" name="submit" value="Send melding" class="submit-button" />
				</form>
			</div>
		</div>
	</div>

</div>


<?php
require_once 'core/footer.php';

echo Init::footer(); 








