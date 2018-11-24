#!/usr/bin/php
<?php
require_once('../path.inc');
require_once('../get_host_info.inc');
require_once('../rabbitMQLib.inc');
include('../myFunctions.php');

$server = new rabbitMQServer("testRabbitMQ.ini","viewServer");

echo "viewRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "regRabbitMQServer END".PHP_EOL;
exit();
?>

