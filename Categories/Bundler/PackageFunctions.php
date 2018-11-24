<?php
require_once('~/Konsolidate/Categories/Require/path.inc');
require_once('~/Konsolidate/Categories/Require/get_host_info.inc');
require_once('~/Konsolidate/Categories/Require/rabbitMQLib.inc');

function dePackage($name, $version, $path, $status, $description)
{
	$con = mysqli_connect("localhost", "admin", "password", "masterDB");
	mysqli_select_db($con, "masterDB");

	//Checking if connected to database
	if (!$con){
		logError("Connection Failed: " . mysqli_connect_error());
		die("Connection failed: " . mysqli_connect_error());
	}

	//Checks username and hashes the password to chek database
	$s = "INSERT INTO `packages` (`Name`, `Version`, `Path`, `Status`, `Decription`) VALUES ('$name', '$version', '$path', '$status', '$description')";
	echo "SQL Statement is: $s";
	mysqli_query($con, $s);
	echo "Successfully inserted into packages table";
}

//Description of new row to be added to the packages database
function devPackage($name, $version, $path, $status, $description)
{
	if($status == "")
	{
		$status = "testing";
	}
	//Creating a new Client for RabbitMQ
	$client = new rabbitMQClient("testRabbitMQ.ini", "devServer");
	//New array to eventually send
	$request = array();
	$request['type'] = "package";
	$request['name'] = $name;
	$request['version'] = $version;
	$request['path'] = $path;
	$request['status'] = $status;
	$request['description'] = $description;
	$client->send_request($request);
}
