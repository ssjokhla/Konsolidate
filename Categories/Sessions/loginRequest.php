<?php
// Starting session here:
//session_set_cookie_params(0, "/var/www/html/");
session_start();
$_SESSION["logged"];

require_once('/var/Konsolidate/Categories/Require/path.inc');
require_once('/var/Konsolidate/Categories/Require/get_host_info.inc');
require_once('/var/Konsolidate/Categories/Require/rabbitMQLib.inc');
include('/var/Konsolidate/Categories/Sessions/SessionFunctions.php');

$client = new rabbitMQClient("/var/Konsolidate/Categories/Require/testRabbitMQ.ini","loginServer");
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
$request['username'] = $_POST['username'];
$_SESSION["user1"] = $_POST['username'];
$request['password'] = $_POST['password'];
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
		$_SESSION["Therapist"] = $_POST['username'];
		echo "Successful HCP Login \n Redirecting now...";
		pageLoader("HCPHTML.php");
		break;
	default:
		echo "Failed Login!  Returning to Homepage.";
		pageLoader("index.html");
}
?>
