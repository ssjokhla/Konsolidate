<?php
require_once('/home/samish/IT490/Konsolidate/rabbitmqphp_example/path.inc');
require_once('/home/samish/IT490/Konsolidate/rabbitmqphp_example/get_host_info.inc');
require_once('/home/samish/IT490/Konsolidate/rabbitmqphp_example/rabbitMQLib.inc');
$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
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
$request['type'] = "login";
$request['username'] = $_GET['username'];
$request['password'] = $_GET['password'];
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);

echo "client received response: ".PHP_EOL;
print_r($response);
//print_r($msg);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;



?>
