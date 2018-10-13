#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
//include('myFunctions.php');

function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
	return "ERROR: unsupported message type";
  }
  else if($request['type'] == "log")
  {
	$message = "IP_Address: " . $request['IP_ADDR'] . "Message: " . $request['message'] . "\n\n";
  	error_log($message,3,"Logs/master.log");
	//return logError($request['IP_ADDR'],$request['message']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","logServer");

echo "logRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "logRabbitMQServer END".PHP_EOL;
exit();
?>

