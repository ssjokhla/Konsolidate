<?php
require_once('/var/Konsolidate/Categories/Require/path.inc');
require_once('/var/Konsolidate/Categories/Require/get_host_info.inc');
require_once('/var/Konsolidate/Categories/Require/rabbitMQLib.inc');
//Allows a user to register
function doRegister($username,$password,$role)
{
	$con = mysqli_connect("localhost", "admin", "password", "masterDB");
	mysqli_select_db($con, "masterDB");
	//Checking if connected to database
	if (!$con){
		logError("Connection Failed: " . mysqli_connect_error());
		die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connecting to database\n";
	//Checks if username already exists
	$s = "select * from members where username = '$username'";
	$t = mysqli_query($con, $s);
	echo "MySQL Query sent\n";
	$rowCount = mysqli_num_rows($t);
	#Checks if username is already part of database
	if($rowCount > 0)
	{
		//If username exists redirects to main page
		echo "Please choose another username";
		logError("Username already in database");
		return false;
	}
	else
	{
		//If username isn't in database registers user with the appropriate hash and role value
		$r = "Insert into members (username, password, role) VALUE ('$username', SHA2('$password',512), '$role')";
		$tr= mysqli_query($con,$r);
		echo "Successfully created Account!";
		return true;
	}
}
?>
