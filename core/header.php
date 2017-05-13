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
	<a href="#"><div id="opacity"></div></a>
	<div class="menu" id="menu">
		<div class="menu-inner">
			<ul class="menu-inner-items" id="navmenu">
				<a href="index.php"><li class="menu-inner-items-item">Hjem</li></a>
				<a href="<?php echo 'campus.php?id=' . $id . '#Aktiviteter'?>"><li class="menu-inner-items-item">Aktiviteter</li></a>
				<a href="<?php echo 'campus.php?id=' . $id . '#Omoss'?>"><li class="menu-inner-items-item">Omoss</li></a>
				<a href="<?php echo 'campus.php?id=' . $id . '#Kontaktoss'?>"><li class="menu-inner-items-item">Kontaktoss</li></a>
				<a href="<?php echo 'map.php?id=' . $id ?>"><li class="menu-inner-items-item" id="map">Kart oversikt</li></a>
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
                        if ($element->id === $id){
                        	$class = 'active';
                        } else {
                        	$class = '';
                        }

                        echo '
	                            <a href="campus.php?id=' . $element->id . '">
	                                <div class="menu-inner-campuses-campus" id="campus' . $element->id . '">
	                                    <img class="menu-inner-campuses-campus-icon" src="' . $element->campus_bilde_path . '"/>
	                                    <span class="menu-inner-campuses-campus-name ' . $class . '">' . substr($element->navn,0,1) . '</span>
	                                </div>
	                            </a>
	                        ';
                    }
                ?>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script>
				var $rightMenu = $('#menu');
				var $leftMenu = $('#opacity');
				var rightVal = parseInt($rightMenu.css('right'));
				var leftVal = parseInt($leftMenu.css('left'));

				$('#nav-icon').click(function () {
				    animateRight = (parseInt($rightMenu.css('right')) == 0) ? rightVal : 0;
					$rightMenu.animate({
						right: animateRight + 'px'
				    });

				    animateLeft = (parseInt($leftMenu.css('left')) == 0) ? leftVal : 0;
					$leftMenu.animate({
						left: animateLeft + 'px'
				    });

				    return false; 
				});

				$('#opacity').click(function () {
					$('#nav-icon').toggleClass('open');

					animateRight = (parseInt($rightMenu.css('right')) == 0) ? rightVal : 0;
					$rightMenu.animate({
						right: animateRight + 'px'
				    });

				    animateLeft = (parseInt($leftMenu.css('left')) == 0) ? leftVal : 0;
					$leftMenu.animate({
						left: animateLeft + 'px'
				    });

				    return false; 
				});

				$('#navmenu').find('a').on('click', function (e) {
				    var targetSec = $(this).text();
				    //var targetSec = this.href;
				   	//var targetSec = $('a').attr('href');
				    //var targetSec = $(this).attr('href');
				    $('html, body').animate({
				        scrollTop: $('#' + targetSec).offset().top - 50
				    }, 1000);

				    $('#nav-icon').toggleClass('open');

					animateRight = (parseInt($rightMenu.css('right')) == 0) ? rightVal : 0;
					$rightMenu.animate({
						right: animateRight + 'px'
				    });

				    animateLeft = (parseInt($leftMenu.css('left')) == 0) ? leftVal : 0;
					$leftMenu.animate({
						left: animateLeft + 'px'
				    });
				});

				$(document).on("click", ".active", function (e) {
					e.preventDefault();
				});

	            function aapne($id) {
	                if ($($id).hasClass('aktiv')) {
	                    $($id).removeClass('aktiv');
	                    $($id).addClass('inaktiv');
	                    $('.act-div').removeClass('aktiv-d');
	                    $('.act-div').addClass('inaktiv-d');
	                } else {
	                    $('.act-div-inner-right-box-inner').removeClass('aktiv');
	                    $('.act-div-inner-right-box-inner').addClass('inaktiv');
	                    $('.act-div').addClass('aktiv-d');
	                    $('.act-div').removeClass('inaktiv-d');
	                    $($id).removeClass('inaktiv');
	                    $($id).addClass('aktiv');
	                }
	            }

	            function start($content) {
	                if ($($content).hasClass('stopp')) {
	                    $($content).removeClass('stopp');
	                    $($content).addClass('start');
	                } 
	            }

	            /*$(".tester").click(function () {
				    $tester = $(this);
				    //getting the next element
				    $content = document.getElementByClassName("act");
				    //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.

				    if ($($content).hasClass('stopp')) {
		                    $($content).removeClass('stopp');
		                    $($content).addClass('start');
                	} else {
                		$($content).removeClass('start');
                		$($content).addClass('stopp');
                	}*/


				   /* $content.slideToggle(500, function () {
				        //execute this after slideToggle is done
				        //change text of header based on visibility of content div
				        /*$header.text(function () {
				            //change text based on condition
				            return $content.is(":visible") ? "Collapse" : "Expand";
				        });*/

				    /*});*/
				/*});*/

			</script>
		</div>
	</div>
