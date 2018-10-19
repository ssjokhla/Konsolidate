<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
//$test = $_SERVER['REMOTE_ADDR'];


function logError($message)
{
	$IP = shell_exec('hostname -I');
	$client = new rabbitMQClient("testRabbitMQ.ini", "logServer");
	$request = array();
	$request['type'] = "log";
	//Replace $IP with IP from ifconfig
	$request['IP_ADDR'] = $IP;
	$request['message'] = $message;
	$client->send_request($request);	//Sends to logQueue
}

function pageLoader($path)
{
	header("Refresh: 3; url=$path");
}

function doLogin($username,$password)
{
   global $test;
   $con = mysqli_connect("localhost", "admin", "password", "testDB");
    mysqli_select_db($con, "testDB");
    $s = "select * from members where username = '$username' and password = '$password'";
	echo "SQL Statement: $s";
    //$s = "select * from members where username = 'test' and  password = 'password'";
    $t = mysqli_query($con, $s);
    $rowCount = mysqli_num_rows($t);

    if($rowCount > 0)
    {
	  echo "Successful Login";
	  $row = $t->fetch_assoc();
	  $currentRole = $row['roles'];
	  return $currentRole;
    }
    else
    {
	    echo "Error in logging in";
	    //Send error to listener
	    logError("Authentication Failed when logging in from HTML.");
	    //error_log("Authentication Failed when logging in from HTML.\n", 3, "/var/log/IT490Logs/master.log");
	    return "Error";
    }
    // lookup username in databas
    // check password
    //return true;
    //return false if not valid
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
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

function gateKeeper($path)
{
	if(!isset($_SESSION["logged"]))
	{
		echo "Failed Gatekeeper Test Redirecting to homepage.";
		pageLoader($path);
		return false;
	}
	else
	{
		return true;
	}
}
