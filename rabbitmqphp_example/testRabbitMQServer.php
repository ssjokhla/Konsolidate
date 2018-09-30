#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function doLogin($username,$password)
{
    $con = mysqli_connect("192.168.0.106", "admin", "password", "testDB");
    //$con = mysqli_connect("192.168.0.108", "admin", "password", "testDB");
    mysqli_select_db($con, "testDB");
    $s = "select * from members where username = '$username' and password = '$password'";
    echo "S is: $s";

    //$s = "select * from members where username = 'test' and  password = 'password'";
    $t = mysqli_query($con, $s);
    $rowCount = mysqli_num_rows($t);
    if($rowCount == 1)
    {
	    return "Successful Login";
    }
    else
    {
	    echo $username;
	    echo $password;
	    return "Error";
    }
    // lookup username in databas
    // check password
    return true;
    //return false if not valid
}

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
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>

