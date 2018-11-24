<?php
include('~/Konsolidate/Download/DownloadFunctions.php');
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
 
