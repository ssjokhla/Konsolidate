<?php
require_once('~/Konsolidate/Categories/Require/path.inc');
require_once('~/Konsolidate/Categories/Require/get_host_info.inc');
require_once('~/Konsolidate/Categories/Require/rabbitMQLib.inc');
require_once('~/Konsolidate/Categories/Require/testRabbitMQ.ini');

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
