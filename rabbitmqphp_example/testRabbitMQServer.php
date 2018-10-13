#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
include('myFunctions.php');

function doLogin($username,$password)
{
   //$con = mysqli_connect("localhost", "admin", "password", "testDB");
   //$con = mysqli_connect("192.168.0.112", "admin", "password", "testDB");
    //$con = mysqli_connect("192.168.0.108", "admin", "password", "testDB");
    //mysqli_select_db($con, "testDB");
    //$s = "select * from members where username = '$username' and password = '$password'";
    //$s = "select * from members where username = '$username' and password = '$password'";
    //echo "SQL Statement: $s";
    //$s = "select * from members where username = 'test' and  password = 'password'";
    //$t = mysqli_query($con, $s);
    //$rowCount = mysqli_num_rows($t);
    //if($rowCount > 0)
    //{
//	    echo "Successful login";
//	    return "Successful Login";
//    }
//    else
//    {
//	    echo "Error in logging in";
	    //Send error to listener
//	    logError("Authentication Failed when logging in from HTML.");
	    //error_log("Authentication Failed when logging in from HTML.\n", 3, "/var/log/IT490Logs/master.log");
//	    return "Bad Login";

//    }
    // lookup username in databas
    // check password
    $connection = new MongoDB\Driver\Manager("mongodb://admin:password@localhost:27017");
    $filter = array('username'=>$username,'password'=>$password);
    $options = array('limit'=>1);
    $query = new MongoDB\Driver\Query($filter, $options);
    $rows = $connection->executeQuery('TestDB.members', $query);
    $rowCounter = 0;
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
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>

