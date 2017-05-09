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
	<div id="opacity"></div>
	<div class="menu" id="menu">
		<div class="menu-inner">

		</div>
	</div>
