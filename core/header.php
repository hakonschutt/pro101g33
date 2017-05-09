<?php 

	echo '</br>';
	echo '</br>';
	echo '</br>';
	echo '</br>';
	echo '</br>';
	echo '</br>';
	echo 'header'; 
	$error = null;
	$id = null;

	if (!isset($_GET['id']) && !is_numeric($_GET['id'])) {
		$error = "You need to pass an ID";
	} else {
		$id = $_GET['id'];
	}

	echo $id; 
?>

<body class="mainbody">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#nav-icon').click(function(){
			$(this).toggleClass('open');
		});
	});	
	</script>
	<div class="nav">
	    <div class="nav-bar">
	    	<img class="nav-bar-logo" src="img/westerdals-hvit.png" />
	    	<a href="#"><div id="nav-icon" style="float: right; margin: 20px;">
			  <span></span>
			  <span></span>
			  <span></span>
			  <span></span>
			</div></a>
	    </div>
	</div>
