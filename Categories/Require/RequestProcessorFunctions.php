<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
#include('../Download/DownloadFunctions.php');
#include('../Bundler/PackageFunctions.php');
#include('../Log/logFunctions.php');
include('/var/Konsolidate/Categories/View/ViewFunctions.php');
include('/var/Konsolidate/Categories/Sessions/SessionFunctions.php');
include('/var/Konsolidate/Categories/Register/RegistrationFunctions.php');
include('/var/Konsolidate/Categories/Deployment/DeploymentFunctions.php');
include('/var/Konsolidate/Categories/Download/DownloadFunctions.php');
//$test = $_SERVER['REMOTE_ADDR'];
//Danh was here.


//Is called when listener pulls from RabbitMQ
function requestProcessor($request)
{
	echo "received request".PHP_EOL;
	var_dump($request);
	if(!isset($request['type']))
	{
		return "ERROR: unsupported message type";
	}
	switch ($request['type'])
	{
	case "login":
		return doLogin($request['username'],$request['password']);
	case "validate_session":
		return doValidate($request['sessionId']);
		//Setting up another case to run when we run logError
	case "log":
		$message = "IP_Address: " . $request['IP_ADDR'] . "Date: " . $request['DATE'] . "Message: " . $request['message'] . "\n\n";
		error_log($message,3,"/var/Konsolidate/Categories/Log/Logs/master.log");
	case "reg":
		if($request['role'] == "patient")
		{
			return doPRegister($request['username'],$request['password'],$request['role'],$request['group'],$request['age'],$request['gender'],$request['TTS'],$request['aHand'],$request['dHand'],$request['lLocation'],$request['therapist']);
		}
		else
		{
			return doRegister($request['username'],$request['password'],$request['role']);
		}
	case "view":
		return viewReports($request['role']);
	case "down":
		return doDownload();
	case "package":
		return dePackage($request['name'],$request['path'],$request['status'],$request['SCP'],$request['PackageName']);
	case "pushUpdate":
		return push($request['destination'],$request['category']);
	case "rollback":
		return roll($request['destination'],$request['category']);
	}
	return array("returnCode" => '0', 'message'=>"Server received request and processed");
}



?>
