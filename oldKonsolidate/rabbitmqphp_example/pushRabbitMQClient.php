#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","pushUpdate");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  //$msg = "test message";
  $msg = "Is this working?!";
}

$request = array();
$request['type'] = "pushUpdate";
$request['destination'] = "QABE";
$request['category'] = "categoryTwo";
$request['version'] = "2.0";
$response = $client->send_request($request);
//$response = $client->publish($request);

echo "client received response: ".PHP_EOL;
print_r($msg);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;

