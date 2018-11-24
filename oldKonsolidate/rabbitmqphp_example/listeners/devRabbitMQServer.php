#!/usr/bin/php
<?php
require_once('../path.inc');
require_once('../get_host_info.inc');
require_once('../rabbitMQLib.inc');
include('../myFunctions.php');

$server = new rabbitMQServer("testRabbitMQ.ini","devServer");
echo "devRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "devRabbitMQServer END".PHP_EOL;
exit();
