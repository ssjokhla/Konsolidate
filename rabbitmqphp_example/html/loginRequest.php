<?php
require_once('/home/cong-danh/IT490/Konsolidate/rabbitmqphp_example/path.inc');
require_once('/home/cong-danh/IT490/Konsolidate/rabbitmqphp_example/get_host_info.inc');
require_once('/home/cong-danh/IT490/Konsolidate/rabbitmqphp_example/rabbitMQLib.inc');
include('/home/cong-danh/IT490/Konsolidate/rabbitmqphp_example/myFunctions.php');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}


//$user = $_GET["user"];
//$password = $_GET["password"];


$request = array();
$request['type'] = "login";
$request['username'] = $_GET['username'];
$request['password'] = $_GET['password'];
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);
$payload = json_encode($response);
if($payload == 20)
{
	//header("Refresh: 5, url=PatientHTML.html");
	pageLoader("PatientHTML.html");
}
else
{

	//header("Refresh: 5, url=login.html");
	pageLoader("login.html");
}

//echo $payload;
?>
