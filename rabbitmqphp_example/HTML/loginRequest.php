<?php
require_once('/home/cong-danh/IT490/Konsolidate/rabbitmqphp_example/path.inc');
require_once('/home/cong-danh/IT490/Konsolidate/rabbitmqphp_example/get_host_info.inc');
require_once('/home/cong-danh/IT490/Konsolidate/rabbitmqphp_example/rabbitMQLib.inc');


$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
$client2 = new rabbitMQClient("testRabbitMQ.ini", "logServer");

if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}





$request = array();
$request['type'] = "login";
$request['username'] = $_GET['username'];
$request['password'] = $_GET['password'];
$request['message'] = $msg;
$response = $client->send_request($request);
$response2 = $client2->send_request($request);
//$response = $client->publish($request);

$payload = json_encode($response);
echo $payload;



?>
