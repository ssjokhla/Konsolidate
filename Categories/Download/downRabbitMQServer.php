#!/usr/bin/php
<?php
require_once('~/Konsoliate/Categories/Require/path.inc');
require_once('~/Konsolidate/Categories/Require/get_host_info.inc');
require_once('~/Konsolidate/Categories/Require/rabbitMQLib.inc');
include('~/Konsolidate/Categories/Require/RequestProcessorFunctions.php');
include('~/Konsolidate/Categoires/Download/DownloadFunctions.php');

$server = new rabbitMQServer("testRabbitMQ.ini","downServer");

echo "downRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "downRabbitMQServer END".PHP_EOL;
exit();
?>

