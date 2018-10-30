<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
//$test = $_SERVER['REMOTE_ADDR'];
//Danh was here.

function logError($message)
{
	//Saving our IP Address to a variable
	$IP = shell_exec('hostname -I');
	$Date = shell_exec('date');
	//Creating a new Client for RabbitMQ
	$client = new rabbitMQClient("testRabbitMQ.ini", "logServer");
	$request = array();
	$request['type'] = "log";
	//Replace $IP with IP from ifconfig
	$request['IP_ADDR'] = $IP;
	$request['DATE'] = $Date;
	$request['message'] = $message;
	//Sending to logQueue
	$client->send_request($request);
}

function pageLoader($path)
{
	echo $path;
	header("Refresh: 3; url=$path");
}
function doLogin($username,$password)
{
	global $test;
	$con = mysqli_connect("localhost", "admin", "password", "masterDB");
	mysqli_select_db($con, "masterDB");
	$s = "select * from members where username = '$username' and password = SHA2('$password',512)";
	echo "SQL Statement: $s";
	//$s = "select * from members where username = 'test' and  password = 'password'";
	$t = mysqli_query($con, $s);
	$rowCount = mysqli_num_rows($t);

	if($rowCount > 0)
	{
		echo "Successful Login";
		$row = $t->fetch_assoc();
		$currentRole = $row['role'];
		echo "Current Role:" . $currentRole;
		return $currentRole;
	}
	else
	{
		echo "Error in logging in";
		logError("Authentication Failed when logging in from HTML.");
		return "Bad Login\n";
	}
	return true;
	//Send error to listener
	logError("Authentication Failed when logging in from HTML.");
	//error_log("Authentication Failed when logging in from HTML.\n", 3, "/var/log/IT490Logs/master.log");
	return "Error";
}

function doRegister($username,$password,$role)
{
	$con = mysqli_connect("localhost", "admin", "password", "masterDB");
	mysqli_select_db($con, "masterDB");
	echo "Connecting to database\n";
	$s = "select * from members where username = '$username'";
	$t = mysqli_query($con, $s);
	echo "MySQL Query sent\n";
	$rowCount = mysqli_num_rows($t);
	#Checks if username is already part of database
	if($rowCount > 0)
	{
		echo "Please choose another username";
		logError("Username already in database");
		return false;
	}
	else
	{
		#If username isn't in database registers user with the appropriate hash and role value
		$r = "Insert into members (username, password, role) VALUE ('$username', SHA2('$password',512), '$role')";
		$tr= mysqli_query($con,$r);
		echo "Successfully created Account!";
		return true;	
	}
}

function viewReports($therapist)
{
	echo "View reports called \n";
	//return true;
	$con = mysqli_connect("localhost", "admin", "password", "masterDB");
	mysqli_select_db($con, "masterDB");
	echo "Connected to database\n";
	$s = "select * from members where Therapist = '$therapist'";
	$t = mysqli_query($con, $s);
	echo "MySQL Query sent\n";
	$rowCount = mysqli_num_rows($t);
	$allFields = array();
	while($fetch = mysqli_fetch_field($t))
	{
		if($fetch->name == "password")
		{
			echo "Password Column Found\n";
			continue;
		}
		for($currRow = 0; $currRow < $rowCount; $currRow++)
		{
			$allFields[$fetch->name][$fetch[$currRow]];
		}
	}
	echo "Array returned\n";
	return $allFields;
}

function doDownload()
{
        $con = mysqli_connect("localhost", "admin", "password", "masterDB");
        mysqli_select_db($con, "masterDB");
        $s = "select * from members INTO OUTFILE '/var/lib/mysql-files/members.csv' Fields enclosed BY '' Terminated by ',' escaped by '\"' Lines Terminated By '\r\n'";
        $t = mysqli_query($con, $s);
}


function requestProcessor($request)
{
	echo "received request".PHP_EOL;
	var_dump($request);
	if(!isset($request['type']))
	{
	return "ERROR: unsupported message type";
	}
	switch ($request['type'])
	{
	case "login":
		return doLogin($request['username'],$request['password']);
	case "validate_session":
		return doValidate($request['sessionId']);
		//Setting up another case to run when we run logError
	case "log":
		$message = "IP_Address: " . $request['IP_ADDR'] . "Date: " . $request['DATE'] . "Message: " . $request['message'] . "\n\n";
		error_log($message,3,"Logs/master.log");
	case "reg":
		return doRegister($request['username'],$request['password'],$request['role']);
	case "view":
		return viewReports($request['role']);
	}
	return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

function gateKeeperLogin($path)
{
	if(!isset($_SESSION["logged"]))
	{
		echo "Failed Gatekeeper Test: | Not logged in | Redirecting to homepage.";
		pageLoader($path);
		return false;
	}
	else
	{
		return true;
	}
}

function gateKeeperRole($path, $currRole)
{
	if($_SESSION["user"] != $currRole)
	{
		echo "Failed Gatekeeper Test: | Not correct user | Redirecting to homepage.";
		pageLoader($path);
		return false;
	}
	else
	{
		return true;
	}
}

?>
