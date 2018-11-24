#!/usr/bin/php
<?php
require_once('~/Konsolidate/Categories/Require/path.inc');
require_once('~/Konsolidate/Categories/Require/get_host_info.inc');
require_once('~/Konsolidate/Categories/Require/rabbitMQLib.inc');
require_once('~/Konsolidate/Categories/Require/testRabbitMQ.ini');
include('~/Konsolidate/Categories/Download/DownloadFunctions.php');
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

