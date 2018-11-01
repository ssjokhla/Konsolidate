#!/usr/bin/php


<?php
include("../myFunctions.php");

function doConnect()
{
	$hostname_db = "localhost";
	$database_db = "masterDB";
	$username_db = "amin";
	$password_db = "password";

	$db = mysqli_connect($hostname_db, $username_db, $password_db, $database_db);

	mysqli_select_db($db, $database_db);

	if(!$db){
		logError("Connection Failed: " . mysqli_connect_error());
		die("Connection Failed: " . mysqli_connect_error());
	}

}
doConnect();
?>

