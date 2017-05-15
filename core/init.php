<?php
/*******************************************************************************************************/
/*This php script requires database/db.php
/*
/*This php file is only for functions at the sites core. 
/*
/*******************************************************************************************************/

	error_reporting(E_ALL);
	ini_set('display_errors', '1');

    require 'database/db.php';


   class Init {
   	public static function header(){

   		$content = '
			<!DOCTYPE html>
			<html lang="no">
			<head>
			    <meta charset="utf-8" />
			    <meta name="author" content="Gruppe 36 - PJ2100">
				<meta http-equiv="X-UA-Compatible" content="IE=9" />
				<link rel="shortcut icon" href="img/icons/icon.png" type="image/x-icon" />
				<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />
			    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
		        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
				  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

			    <title>@Campus</title>
			</head>
   		';

   		return $content;

   	} // End header

   	public static function footer(){

   		$content = '
            <script src="assets/js/transportloader.js"></script>
			</body>
			</html>
   		';

   		return $content;

   	} // End footer
   }

   function debug($data, $return = false) {
   	$res = '<pre>' . print_f($data, true) . '</pre>';
   	if ($return){
   		return $res;
   	}
   	echo $res;
   }
?>
