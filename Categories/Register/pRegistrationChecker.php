<?php

include('/var/Konsolidate/Categories/Sessions/SessionFunctions.php');
session_start();
if(gateKeeperLogin("login.html") && gateKeeperRole("login.html", "HCP")){

?>

<?php
//include('/var/Konsolidate/Categories/Sessions/SessionFunctions.php');
include('RegistrationFunctions.php');
$client = new rabbitMQClient("testRabbitMQ.ini","registerServer");
if(isset($_GET['pRegister']))
{
	$pRole="patient";
	$request = array();
	$request['type'] = "reg";
	$request['username'] = $_GET['username'];
	$request['password'] = $_GET['password'];
	$request['role'] = "patient";
	$request['group'] = $_GET['group'];
	$request['age'] = $_GET['age'];
	$request['gender'] = $_GET['gender'];
	$request['TTS'] = $_GET['TTS'];
	$request['aHand'] = $_GET['aHand'];
	$request['dHand'] = $_GET['dHand'];
	$request['lLocation'] = $_GET['lLocation'];
	$request['therapist']= $_SESSION["user1"];
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
		pageLoader("HCPHTML.php");
	}
	else
	{
		pageLoader("pregistration.html");
		logError("Failed registration because username already exists");
	}


}
?>
<?php
}

?>
