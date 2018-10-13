<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

//$test = $_SERVER['REMOTE_ADDR'];
function logError($message)
{
	//Saving our IP Address to a variable
	$IP = shell_exec('hostname -I');
	//Creating a new Client for RabbitMQ
	$client = new rabbitMQClient("testRabbitMQ.ini", "logServer");
	$request = array();
	$request['type'] = "log";
	//Replace $IP with IP from ifconfig
	$request['IP_ADDR'] = $IP;
	$request['message'] = $message;
	//Sending to logQueue
	$client->send_request($request);
}

function doLogin($username,$password)
{
    //Establishing Connection to MongoDB
    $connection = new MongoDB\Driver\Manager("mongodb://admin:password@localhost:27017");
    //Setting up Query for authentication
    $filter = array('username'=>$username,'password'=>$password);
    $options = array('limit'=>1);
    //Writing the Query for authentication
    $query = new MongoDB\Driver\Query($filter, $options);
    //Executing the Query
    $rows = $connection->executeQuery('TestDB.members', $query);
    $rowCounter = 0;
    //Checking if Authentication succeeded or failed
    foreach($rows as $row)
    {
        $rowCounter = $rowCounter + 1;
        var_dump($row);
    }
    if($rowCounter > 0)
    {
        echo "Successful Login.";
        return "Successful Login";
    }
    else
    {
        echo "Error in Logging in";
	//Logging an Error if the authentication was bad (Mainly a check to see if logError function is working)
        logError("Authentication Failed when logging in from HTML.");
        return "Bad Login";
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
    $message = "IP_Address: " . $request['IP_ADDR'] . "Message: " . $request['message'] . "\n\n";
    error_log($message,3,"Logs/master.log");

  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}




?>
