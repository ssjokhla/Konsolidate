<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

//$test = $_SERVER['REMOTE_ADDR'];
$IP = "127.0.0.1";
function logError($IP,$message)
{
//	$IP = $_SERVER['REMOTE_ADDR'];
	$client = new rabbitMQClient("testRabbitMQ.ini", "logServer");
	$request = array();
	$request['type'] = "log";
	//Replace $IP with IP from ifconfig
	$request['IP_ADDR'] = $IP;
	$request['message'] = $message;
	$client->send_request($request);	//Sends to logQueue
}
?>
