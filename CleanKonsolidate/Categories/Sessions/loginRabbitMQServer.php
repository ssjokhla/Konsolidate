#!/usr/bin/php
<?php
require_once('../path.inc');
require_once('../get_host_info.inc');
require_once('../rabbitMQLib.inc');
include('../myFunctions.php');

$server = new rabbitMQServer("testRabbitMQ.ini","loginServer");
echo "loginRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "loginRabbitMQServer END".PHP_EOL;
exit();
