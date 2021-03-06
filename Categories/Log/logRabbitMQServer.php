#!/usr/bin/php
<?php
require_once('/var/Konsolidate/Categories/Require/path.inc');
require_once('/var/Konsolidate/Categories/Require/get_host_info.inc');
require_once('/var/Konsolidate/Categories/Require/rabbitMQLib.inc');

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
	$message = "IP_Address: " . $request['IP_ADDR'] . "Date: " . $request['DATE'] . "Message: " . $request['message'] . "\n\n";
  	error_log($message,3,"/var/Konsolidate/Categories/Log/Logs/master.log");
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
