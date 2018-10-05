<<<<<<< HEAD
#!/user/bin/php
=======
#!/usr/bin/php
>>>>>>> 8ded33110a5d9d6d6699bd38004c50cd3e481e0d
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
<<<<<<< HEAD

 
function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);			// Prints out the output we see in testRabbitMQServer.php
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "log":
      return doLogin($request['username'],$request['password']);
    case "validate_session":
      return doValidate($request['sessionId']);
=======
include('myFunctions.php');

    function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
	return "ERROR: unsupported message type";
  }
  else if($request['type'] == "log")
  {
	$message = "IP_Address: " . $request['IP_ADDR'] . "Message: " . $request['message'] . "\n\n";
  	error_log($message,3,"Logs/master.log");
	//return logError($request['IP_ADDR'],$request['message']);
>>>>>>> 8ded33110a5d9d6d6699bd38004c50cd3e481e0d
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

<<<<<<< HEAD

$server = new rabbitMQServer("testRabbitMQ.ini","logServer");
echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
?>
=======
$server = new rabbitMQServer("testRabbitMQ.ini","logServer");

echo "logRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "logRabbitMQServer END".PHP_EOL;
exit();
?>

>>>>>>> 8ded33110a5d9d6d6699bd38004c50cd3e481e0d
