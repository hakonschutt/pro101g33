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
	    	<a href="index.php"><img class="nav-bar-logo" src="img/westerdals-hvit.png" /></a>
	    	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#nav-icon').click(function(){
						$(this).toggleClass('open');
					});
				});	
			</script>
	    	<a href="#"><div id="nav-icon" style="float: right; margin: 20px;">
			  <span></span>
			  <span></span>
			  <span></span>
			  <span></span>
			</div></a>
	    </div>
	</div>
	<script type="text/javascript">
		var btnClick = document.getElementById("nav-icon");

		btnClick.addEventListener("click", function() {
		    var myDiv = document.getElementById("menu");
		    var myDiv2 = document.getElementById("opacity");
		    if (myDiv.style.display == "block") {
		       myDiv.style.display = "none";
		       myDiv2.style.display = "none";
		    }
		    else{
		        myDiv.style.display = "block";
		        myDiv2.style.display = "block";
		    }
		});
	</script>
	<a href="#"><div id="opacity"></div></a>
	<div class="menu" id="menu">
		<div class="menu-inner">
			<ul class="menu-inner-items">
				<a href="index.php"><li class="menu-inner-items-item">Hjem</li></a>
				<a href="#Aktiviteter"><li class="menu-inner-items-item">Aktiviteter</li></a>
				<a href="#omoss"><li class="menu-inner-items-item">Om oss</li></a>
				<a href="#kontaktoss"><li class="menu-inner-items-item">Kontakt oss</li></a>
				<a href="#"><li class="menu-inner-items-item">Kart oversikt</li></a>
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
                        if ($element->campus_id === $id){
                        	$class = 'active';
                        } else {
                        	$class = '';
                        }

                        echo '
	                            <a href="campus.php?id=' . $element->campus_id . '">
	                                <div class="menu-inner-campuses-campus ' . $class . '" id="campus' . $element->campus_id . '">
	                                    <img class="menu-inner-campuses-campus-icon" src="' . $element->bilde_path . '"/>
	                                    <span class="menu-inner-campuses-campus-name">' . substr($element->navn,0,1) . '</span>
	                                </div>
	                            </a>
	                        ';
                    }
                ?>
            </div>
		</div>
	</div>
