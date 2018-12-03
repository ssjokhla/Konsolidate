#!/usr/bin/php
<?php
require_once('/var/Konsolidate/Categories/Require/path.inc');
require_once('/var/Konsolidate/Categories/Require/get_host_info.inc');
require_once('/var/Konsolidate/Categories/Require/rabbitMQLib.inc');
include('/var/Konsolidate/Categories/Require/RequestProcessorFunctions.php');

$server = new rabbitMQServer("testRabbitMQ.ini","loginServer");
echo "loginRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "loginRabbitMQServer END".PHP_EOL;
exit();
