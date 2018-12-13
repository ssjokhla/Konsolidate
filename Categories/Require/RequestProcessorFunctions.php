<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
include('/var/Konsolidate/Categories/Sessions/SessionFunctions.php');
include('/var/Konsolidate/Categories/Register/RegistrationFunctions.php');


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
	case "log":
		$message = "IP_Address: " . $request['IP_ADDR'] . "Date: " . $request['DATE'] . "Message: " . $request['message'] . "\n\n";
		error_log($message,3,"/var/Konsolidate/Categories/Log/Logs/master.log");
	case "reg":
		return doRegister($request['username'],$request['password'],$request['role']);
	case "view":
		return viewReports($request['role']);
	case "down":
		return doDownload();
	case "package";
		return dePackage($request['name'],$request['version'],$request['path'],$request['status'],$request['description']);
	}
	return array("returnCode" => '0', 'message'=>"Server received request and processed");
}
