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
		            <div onclick="on(\'#act-div' . $element->id  . '\'); return false;" class="activity" id="activity' . $element->id . '">
                        <a href="#" tabindex="0" onclick="on(\'#act-div' . $element->id  . '\'); return false;">
		                <img title="Finn ut mer" class="activity-icon" src="' . $element->type_bilde_path . '" alt="logo for aktivitet ' . $element->type_navn . '"/>
		                <span class="activity-name">' . $element->type_navn . '</span>
                        </a>
		            </div>
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
							<img class"act-div-inner-left-icon" src="' . $element->type_bilde_path . '" alt="logo for aktivitet ' . $element->type_navn . '"/>
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
									<div title="Finn ut mer" class="act-div-inner-right-box">
                                    <div id="aktivitet' . $row->id  . '" class="act-div-inner-right-box-inner inaktiv">
                                        <a href="#" tabindex="0" onclick="aapne(\'#aktivitet' . $row->id  . '\'); return false;" class="act-div-inner-right-box-inner-wrap CallWrapper">
										<div class="act-div-inner-right-box-inner-wrap CallWrapper">
												<h3 class="act-div-inner-right-box-name">' . $row->navn . '</h3>
                                                
												<div class="act-div-inner-right-box-right">
													<p class="act-div-inner-right-box-right-reisetid">Reisetid: ' . $row->reisetid . 'min</p>
													<p class="act-div-inner-right-box-right-les">Les mer</p>
												</div>
											</div>
                                            </a>
											<div class="act-div-inner-right-box-drop dropdown">
												<div class="dropdown-inner">'
                                                ;

												if ($row->type_id == 1){
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
															<a tabindex="-1" href="map.php?id=' . $id . '&data_id=' . $row->id . '"><div tabindex="-1" class="dropdown-inner-image" style="background-image: url(' . $row->bilde_path . '); background-position: center;"></div></a>
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
														<a tabindex="-1" href="map.php?id=' . $id . '&data_id=' . $row->id . '"><div class="dropdown-inner-image" style="background-image: url(' . $row->bilde_path . '); background-position: center;"></div></a>
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
			<img class="info-inner-right-image" src="img/LargePic/image1.jpg" alt="bilde av westerdals elever på vulkan" />
			<img class="info-inner-right-image" src="img/LargePic/image2.jpg" alt="bilde av westerdals elever i forelesning på fjerdingen" />
			<img class="info-inner-right-image" src="img/LargePic/image3.jpg" alt="bilde av campus fjerdingen på innsiden" />
		</div>
	</div>
</div>

<div class="contact" id="Kontaktoss" style="background-image: url('img/LargePic/Background.png');">
	<div class="contact-inner">
		<h1 class="contact-inner-header">Kontakt oss</h1>
		<div class="contact-inner-left">
			<img class="contact-inner-left-image" src="img/LargePic/map.png" alt="bilde av kart over campusene" />
			<div class="contact-inner-left-info">
				<div class="contact-inner-left-info-bit">
					<img src="img/icons/pin.png" alt="location pin" />
					<p style="bottom: 12px;">Chr. Krohgs gate 32, </br>0186 Oslo</p>
				</div>
				<div class="contact-inner-left-info-bit">
					<img src="img/icons/mail.png" alt="mail logo" />
					<p>post@westerdals.no</p>
				</div>
				<div class="contact-inner-left-info-bit">
					<img src="img/icons/phone.png" alt="phone logo" />
					<p>22 05 75 50</p>
				</div>	
			</div>
		</div>
		<div class="contact-inner-right">
			<div class="contact-inner-right-wrap">
				<form method="post" id="contactForm" action="core/contactaction.php">
					<input required title="Skriv inn navnet ditt." type="text" name="Name" id="Name" placeholder="Navn"/>
		
					<input required title="Skriv inn e-post adressen din." type="email" name="Email" id="Email" placeholder="Email"/>
					
					<textarea title="Skriv inn melding din." required name="Message" rows="20" cols="20" id="Message" placeholder="Melding"></textarea>

					<input title="Send meldingen" type="submit" name="submit" value="Send melding" class="submit-button" />
				</form>
			</div>
		</div>
	</div>

</div>


<?php
require_once 'core/footer.php';

echo Init::campusfooteradd();
echo Init::footer(); 








