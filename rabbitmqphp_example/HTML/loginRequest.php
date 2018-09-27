<?php
require_once('/home/cong-danh/IT490/Konsolidate/rabbitmqphp_example/path.inc');
require_once('/home/cong-danh/IT490/Konsolidate/rabbitmqphp_example/get_host_info.inc');
require_once('/home/cong-danh/IT490/Konsolidate/rabbitmqphp_example/rabbitMQLib.inc');


$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}

/**/

$user = $_GET["user"];
$password = $_GET["password"];

/**/

$request = array();
$request['type'] = "login";
$request['username'] = $user;
$request['password'] = $password;
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);

$payload = json_encode($response);
echo $payload;
