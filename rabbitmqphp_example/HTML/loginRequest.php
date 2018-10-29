<?php
// Starting session here:
//session_set_cookie_params(0, "/var/www/html/");
session_start();
$_SESSION["logged"];

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


$payload = json_encode($response);

switch($payload)
{
	case '"patient"':
		$_SESSION["logged"] = true;			// Logging the patient user
		$_SESSION["user"] = "patient";	
		echo "Successful Patient Login \n Redirecting now...";
		pageLoader("PatientHTML.php");
		break;
	case '"researcher"':
		$_SESSION["logged"] = true;			// Logging the researcher user
		$_SESSION["user"] = "researcher";	
		echo "Successful Researcher Login \n Redirecting now...";
		pageLoader("ResearcherHTML.php");
		break;
	case '"HCP"':
		$_SESSION["logged"] = true;			// Logging the HCP user
		$_SESSION["user"] = "HCP";		
		echo "Successful HCP Login \n Redirecting now...";
		pageLoader("HCPHTML.php");
		break;
	default:
		echo "Failed Login!  Returning to Homepage.";
		pageLoader("login.html");
}
?>
