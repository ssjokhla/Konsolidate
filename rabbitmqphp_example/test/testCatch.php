#!/usr/bin/php


<?php
include("../myFunctions.php");

function doConnect()
{
	$hostname_db = "localhost";
	$database_db = "masterDB";
	$username_db = "admin";
	$password_db = "password";

	try{

		if($db = mysqli_connect($hostname_db, $username_db, $password_db, $database_db))
		{
			echo "Database Connected";
			mysqli_query($db, $database_db);
			$s = "select * from members";
			$t = mysqli_query($con, $s);
			echo $t;
		}
		else
		{
			throw new Exception("Unable to connect to database");
		}
	}
	catch(Exception $e)
	{
		logError($e->getMessage());
	}
}
?>

