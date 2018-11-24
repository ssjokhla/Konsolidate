<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
//$test = $_SERVER['REMOTE_ADDR'];
//Danh was here.

//Creates a log with a specific message for error
function logError($message)
{
	//Saving our IP Address to a variable
	$IP = shell_exec('hostname -I');
	//Saving the Date to a variable
	$Date = shell_exec('date');
	//Creating a new Client for RabbitMQ
	$client = new rabbitMQClient("testRabbitMQ.ini", "logServer");
	//New array to eventually send
	$request = array();
	$request['type'] = "log";
	//Replace $IP with IP from ifconfig
	$request['IP_ADDR'] = $IP;
	$request['DATE'] = $Date;
	$request['message'] = $message;
	//Sending to logQueue
	$client->send_request($request);
}
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
function devPackage($name, $version, $path, $status, $description, $PackageName)
{
	if($status == "")
	{
		$status = "testing";
	}
	$whoami = shell_exec("whoami | awk '{print $1}'");
	$IP = shell_exec("hostname -I | awk '{print $1}'");
	$SCP = $whoami."@".$IP;
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
	$request['SCP'] = $SCP;
	$request['PackageName'] = $PackageName;
	$client->send_request($request);
}
//Redirects to another page to load
function pageLoader($path)
{
	//Printing out path we are redirecting to
	echo $path;
	//Redirecting
	header("Refresh: 0; url=$path");
}

//Takes user input and checks database to confirm login
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

//Function to allow HCP to view their patients
function viewReports($therapist)
{
	echo "View reports called \n";
	//return true;

	$con = mysqli_connect("localhost", "admin", "password", "masterDB");
	mysqli_select_db($con, "masterDB");

	//Checking if connected to database
        if (!$con){
                logError("Connection Failed: " . mysqli_connect_error());
                die("Connection failed: " . mysqli_connect_error());
        }

	echo "Connected to database\n";
	//Finds users with their therapist
	$s = "select * from members where Therapist = '$therapist'";
	$t = mysqli_query($con,$s);
	echo "MySQL Query sent\n";
	$rowCount = mysqli_num_rows($t);

	//Created an array for the values we're pulling
	$array = array();
	//Used to keep track of column values (horizontal)
	$colCounter = 0;
	while($fetch = mysqli_fetch_field($t))
	{
		//Counter used to index values set to key in 2 dimensional array.
		$tmpCount = 0;
		//Takes each row one at a time.
		while($row = mysqli_fetch_array($t))
		{	
			//Inputs new entry in array with key and array pair.
			$array[$fetch->name][$tmpCount] = $row[$colCounter];
			//Increment to get to next index.
			$tmpCount++;
		}
		//Reset the fetch to preventt hitting NULL.
		mysqli_data_seek($t, 0);	 
		//Increment to net column for next loop.
		$colCounter++;
	}
	//Return array to php so it can be viewed in the browser
	return $array;
}

//Function called when user wants to download a file
function doDownload()
{
        $con = mysqli_connect("localhost", "admin", "password", "masterDB");
        mysqli_select_db($con, "masterDB");

	//Checking if connected to database
        if (!$con){
                logError("Connection Failed: " . mysqli_connect_error());
                die("Connection failed: " . mysqli_connect_error());
        }

	//SQL query sent to database to send contents of dataTable to another directory, that directory will forward it to apache server for download
        $s = "select * from dataTable INTO OUTFILE '/var/lib/mysql-files/dataTable.csv' Fields enclosed BY '' Terminated by ',' escaped by '\"' Lines Terminated By '\r\n'";
        $t = mysqli_query($con, $s);
}

//Is called when listener pulls from RabbitMQ
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
	case "down":
		return doDownload();
	case "package";
		return dePackage($request['name'],$request['version'],$request['path'],$request['status'],$request['description']);
	}
	return array("returnCode" => '0', 'message'=>"Server received request and processed");
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

?>
