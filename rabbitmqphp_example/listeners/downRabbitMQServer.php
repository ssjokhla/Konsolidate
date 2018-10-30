#!/usr/bin/php
<?php
require_once('../path.inc');
require_once('../get_host_info.inc');
require_once('../rabbitMQLib.inc');
include('../myFunctions.php');

$server = new rabbitMQServer("testRabbitMQ.ini","downServer");

echo "downRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "downRabbitMQServer END".PHP_EOL;
exit();
?>

