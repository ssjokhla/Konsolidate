#!/usr/bin/php
<?php
<<<<<<< HEAD
require_once('~/Konsoliate/Categories/Require/path.inc');
require_once('~/Konsolidate/Categories/Require/get_host_info.inc');
require_once('~/Konsolidate/Categories/Require/rabbitMQLib.inc');
include('~/Konsolidate/Categories/Require/RequestProcessorFunctions.php');
include('~/Konsolidate/Categoires/Download/DownloadFunctions.php');
=======
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
>>>>>>> 3d3cfb9c59f458d5765b0c765b0003d795735b52

$server = new rabbitMQServer("testRabbitMQ.ini","downServer");

echo "downRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "downRabbitMQServer END".PHP_EOL;
exit();
?>

