#!/usr/bin/php
<?php
require_once('../Require/path.inc');
require_once('../Require/get_host_info.inc');
require_once('../Require/rabbitMQLib.inc');
include('../Require/RequestProcessorFunctions.php');

$server = new rabbitMQServer("testRabbitMQ.ini","loginServer");
echo "loginRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "loginRabbitMQServer END".PHP_EOL;
exit();
