<?php
<<<<<<< HEAD
include('~/Konsolidate/Download/DownloadFunctions.php');
=======
//include('/home/qa/Konsolidate/rabbitmqphp_example/myFunctions.php');
require_once('~/Konsolidate/Categories/Require/testRabbitMQ.ini');
include('~/Konsolidate/Categories/Download/DownloadFunctions.php');
>>>>>>> 3d3cfb9c59f458d5765b0c765b0003d795735b52
session_start();
echo "Session started";
$client = new rabbitMQClient("testRabbitMQ.ini","downServer");
echo "Client created";
if(isset($_GET['down']))
{
	echo "If statement hit";
	$request = array();
	$request['type'] = "down";
	$request['message'] = $msg;
	$response = $client->send_request($request);
	//$response = $client -> send_request($request);
	sleep(3);
	$files = scandir("/var/www/html/downloads/");
	echo "$files[2]";
}
else
{
	echo "IF STATEMENT FAILED";
}

	for($i=2; $i < count($files); $i++)
	{
?>
<!DOCTYPE>
<html>
<p>
	<a href="downloads/
<?php
		echo $files[$i];
			
?>
"><?php echo $files[$i]; ?></a>
			</p>
<?php
	}
 
?>
</html>
 
