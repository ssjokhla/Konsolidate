#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
include('myFunctions.php');

$server = new rabbitMQServer("testRabbitMQ.ini","logServer");

echo "logRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "logRabbitMQServer END".PHP_EOL;
exit();
?>

