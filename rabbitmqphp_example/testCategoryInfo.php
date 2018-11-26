#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","categoryInfo");

$request = array();
$request['category'] = "This is a test Category";
$response = $client->send_request($request);
//$response = $client->publish($request);

echo "client received response: ".PHP_EOL;
print_r($msg);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;
