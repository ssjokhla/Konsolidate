<?php
require_once('/var/Konsolidate/Categories/Require/path.inc');
require_once('/var/Konsolidate/Categories/Require/get_host_info.inc');
require_once('/var/Konsolidate/Categories/Require/rabbitMQLib.inc');
include('/var/Konsolidate/Categories/Log/logFunctions.php');
//Redirects to another page to load
function pageLoader($path)
{
	//Printing out path we are redirecting to
	echo $path;
	//Redirecting
	header("Refresh: 0; url=$path");
}

function doLogin($username,$password)
{
	global $test;
	//Connects to database
	$con = mysqli_connect("localhost", "admin", "password", "masterDB");
	mysqli_select_db($con, "masterDB");

	//Checking if connected to database
	if (!$con){
		logError("Connection Failed: " . mysqli_connect_error());
		die("Connection failed: " . mysqli_connect_error());
	}

	//Checks username and hashes the password to chek database
	$s = "select * from members where username = '$username' and password = SHA2('$password',512)";
	echo "SQL Statement: $s";
	$t = mysqli_query($con, $s);
	//Checks how many of that username is in the database
	$rowCount = mysqli_num_rows($t);

	if($rowCount > 0)
	{
		//If there are users log in works
		echo "Successful Login";
		$row = $t->fetch_assoc();
		$currentRole = $row['role'];
		echo "Current Role:" . $currentRole;
		return $currentRole;
	}
	else
	{
		//If there are 0 entries then log in fails
		echo "Error in logging in";
		logError("Authentication Failed when logging in from HTML.");
		return "Bad Login\n";
	}
	return true;
	//Send error to log listener
	logError("Authentication Failed when logging in from HTML.");
	return "Error";
}

//Checks for log in validation
function gateKeeperLogin($path)
{
	//Checks if logged flag does not exist
	if(!isset($_SESSION["logged"]))
	{
		//Reirects to home page
		echo "Failed Gatekeeper Test: | Not logged in | Redirecting to homepage.";
		pageLoader($path);
		return false;
	}
	else
	{
		return true;
	}
}

//Stops user from switching roles to circumvent security
function gateKeeperRole($path, $currRole)
{
	//Checks if the User's role is set to another role
	if($_SESSION["user"] != $currRole)
	{
		//Reirects to home page
		echo "Failed Gatekeeper Test: | Not correct user | Redirecting to homepage.";
		pageLoader($path);
		return false;
	}
	else
	{
		return true;
	}
}
