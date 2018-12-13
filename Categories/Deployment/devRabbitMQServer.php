#!/usr/bin/php
<?php
require_once('/var/Konsolidate/Categories/Require/path.inc');
require_once('/var/Konsolidate/Categories/Require/get_host_info.inc');
require_once('/var/Konsolidate/Categories/Require/rabbitMQLib.inc');
include('/var/Konsolidate/Categories/Sessions/SessionFunctions.php');
include('/var/Konsolidate/Categories/Require/RequestProcessorFunctions.php');


$server = new rabbitMQServer("testRabbitMQ.ini","devServer");
echo "devRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "devRabbitMQServer END".PHP_EOL;
exit();
