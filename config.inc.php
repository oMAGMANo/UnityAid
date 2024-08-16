<?php
date_default_timezone_set('Asia/Kolkata');
$connect_string = 'localhost';
	$connect_username = 'root';
	$connect_password = '';
	$connect_db = 'groundin_crowd';

	// $site_url = $_SERVER['HTTP_HOST'];
	// define("SCROLL_COLOR","#C6D7E7");
	// define("SITETITLE","Unity Aid");

   $con = 	mysqli_connect($connect_string, $connect_username, $connect_password, $connect_db) or die("Connection Failed!");
   
    // $keyId='rzp_live_zCocMK82i5VTAg';
    // $keySecret='MKRsjvP59DxtVmlFcuByFvcD';
     
	$base_url = 'http://localhost/project/index.php';
     
    // $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
   
?>