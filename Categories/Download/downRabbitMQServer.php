#!/usr/bin/php
<?php
require_once('/var/Konsolidate/Categories/Require/path.inc');
require_once('/var/Konsolidate/Categories/Require/get_host_info.inc');
require_once('/var/Konsolidate/Categories/Require/rabbitMQLib.inc');
require_once('/var/Konsolidate/Categories/Require/testRabbitMQ.ini');
include('/var/Konsolidate/Categories/Download/DownloadFunctions.php');
include('/var/Konsolidate/Categories/Require/RequestProcessorFunctions.php');
//remember to include requestProcessor

//require_once('../path.inc');
//require_once('../get_host_info.inc');
//require_once('../rabbitMQLib.inc');
//include('../myFunctions.php');


$server = new rabbitMQServer("testRabbitMQ.ini","downServer");

echo "downRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "downRabbitMQServer END".PHP_EOL;
exit();
?>
