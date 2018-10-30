#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
include('myFunctions.php');

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
	case "reg":
		return doRegister($request['username'],$request['password'],$request['role']);
	}
	return array("returnCode" => '0', 'message'=>"Server received request and processed");
}


$server = new rabbitMQServer("testRabbitMQ.ini","registerServer");

echo "regRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "regRabbitMQServer END".PHP_EOL;
exit();
?>

