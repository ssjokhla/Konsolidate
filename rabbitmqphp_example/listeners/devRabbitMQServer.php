#!/usr/bin/php
<?php
require_once('/home/deployment/Konsolidate/rabbitmqphp_example/path.inc');
require_once('/home/deployment/Konsolidate/rabbitmqphp_example/get_host_info.inc');
require_once('/home/deployment/Konsolidate/rabbitmqphp_example/rabbitMQLib.inc');
include('/home/deployment/Konsolidate/rabbitmqphp_example/myFunctions.php');


$server = new rabbitMQServer("testRabbitMQ.ini","devServer");
echo "devRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "devRabbitMQServer END".PHP_EOL;
exit();
