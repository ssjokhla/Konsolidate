#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
include('myFunctions.php');

$server = new rabbitMQServer("testRabbitMQ.ini","registerServer");

echo "regRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "regRabbitMQServer END".PHP_EOL;
exit();
?>

