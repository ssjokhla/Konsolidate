#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
<<<<<<< HEAD

function requestProcessor($request)
=======
include('myFunctions.php');

    function requestProcessor($request)
>>>>>>> 8ded33110a5d9d6d6699bd38004c50cd3e481e0d
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
<<<<<<< HEAD
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "login":
      return doLogin($request['username'],$request['password']);
    case "validate_session":
      return doValidate($request['sessionId']);
=======
	return "ERROR: unsupported message type";
  }
  else if($request['type'] == "log")
  {
	$message = "IP_Address: " . $request['IP_ADDR'] . "Message: " . $request['message'] . "\n\n";
  	error_log($message,3,"Logs/master.log");
	//return logError($request['IP_ADDR'],$request['message']);
>>>>>>> 8ded33110a5d9d6d6699bd38004c50cd3e481e0d
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","logServer");

<<<<<<< HEAD
echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
=======
echo "logRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "logRabbitMQServer END".PHP_EOL;
>>>>>>> 8ded33110a5d9d6d6699bd38004c50cd3e481e0d
exit();
?>

