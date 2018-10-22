<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

//$test = $_SERVER['REMOTE_ADDR'];
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

function doLogin($username,$password)
{
   $con = mysqli_connect("localhost", "admin", "password", "testDB");
    mysqli_select_db($con, "testDB");
    $s = "select * from members where username = '$username' and password = '$password'";
    $t = mysqli_query($con, $s);
    $rowCount = mysqli_num_rows($t);
    if($rowCount > 0)
    {
	    echo "Successful Login.";
	    return "Successful Login\n";
    }
    else
    {
	    echo "Error in logging in";
	    logError("Authentication Failed when logging in from HTML.");
	    return "Bad Login\n";
    }
    return true;
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
    //Setting up another case to run when we run logError
    case "log":
    $message = "IP_Address: " . $request['IP_ADDR'] . "Date: " . $request['DATE'] . "Message: " . $request['message'] . "\n\n";
    error_log($message,3,"Logs/master.log");

  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}




?>
