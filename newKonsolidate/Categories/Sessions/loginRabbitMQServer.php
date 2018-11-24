#!/usr/bin/php
<?php
require_once('~/Konsolidate/Categories/Require/path.inc');
require_once('~/Konsolidate/Categories/Require/get_host_info.inc');
require_once('~/Konsolidate/Categories/Require/rabbitMQLib.inc');
include('~/Konsolidate/Categories/Require/RequestProcessorFunctions.php');

$server = new rabbitMQServer("~/Konsolidate/Categories/Require/testRabbitMQ.ini","loginServer");
echo "loginRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "loginRabbitMQServer END".PHP_EOL;
exit();
