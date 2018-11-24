<?php
// Starting session here:
//session_set_cookie_params(0, "/var/www/html/");
session_start();
$_SESSION["logged"];

require_once('~/Konsolidate/Categories/Require/path.inc');
require_once('~/Konsolidate/Categories/Require/get_host_info.inc');
require_once('~/Konsolidate/Categories/Require/rabbitMQLib.inc');
include('~/Konsolidate/Categories/Sessions/SessionFunctions.php');

$client = new rabbitMQClient("~/Konsolidate/Categories/Require/testRabbitMQ.ini","loginServer");
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
$_SESSION["user1"] = $_GET['username'];
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
echo $payload;
switch($payload)
{
	case '"patient"':
		$_SESSION["logged"] = true;			// Logging the patient user
		$_SESSION["user"] = "patient";
		echo "Successful Patient Login \n Redirecting now...";
		pageLoader("~/Konsolidate/Categories/Patient/PatientHTML.php");
		break;
	case '"researcher"':
		$_SESSION["logged"] = true;			// Logging the researcher user
		$_SESSION["user"] = "researcher";
		echo "Successful Researcher Login \n Redirecting now...";
		pageLoader("~/Konsolidate/Categories/Researcher/ResearcherHTML.php");
		break;
	case '"hcp"':
		$_SESSION["logged"] = true;			// Logging the HCP user
		$_SESSION["user"] = "hcp";
		$_SESSION["Therapist"] = $_GET['username'];
		echo "Successful HCP Login \n Redirecting now...";
		pageLoader("~/Konsolidate/Categories/HCP/HCPHTML.php");
		break;
	default:
		echo "Failed Login!  Returning to Homepage.";
		pageLoader("login.html");
}
?>
