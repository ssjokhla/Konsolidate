<?php
include('/var/Konsolidate/Categories/Sessions/SessionFunctions.php');
include('RegistrationFunctions.php');
$client = new rabbitMQClient("testRabbitMQ.ini","registerServer");
if(isset($_GET['Register']))
{
	$request = array();
	$request['type'] = "reg";
	$request['username'] = $_GET['username'];
	$request['password'] = $_GET['password'];
	$request['role'] = $_GET['role'];
	$request['message'] = $msg;
	$response = $client->send_request($request);

	echo "client received response: ".PHP_EOL;
	print_r($response);


	echo "\n\n";

	echo $argv[0]." END".PHP_EOL;


	$payload = json_encode($response);
	echo $payload;
	if($payload==true)
	{
		pageLoader("login.html");
	}
	else
	{
		pageLoader("registration.html");
		logError("Failed registration because username already exists");
	}


}
?>
