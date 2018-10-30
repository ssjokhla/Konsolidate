<?php
include('/home/cong-danh/IT490/Konsolidate/rabbitmqphp_example/myFunctions.php');
session_start();

$client = new rabbitMQClient("testRabbitMQ.ini","registerServer");
if(isset($_GET['download']))
{
	$request = array();
	$request['type'] = "down";
	$request['message'] = $msg;
	$response = $client->send_request($request);
	$response = $client -> send_request($request);
	$files = scandir("/var/www/html/downloads/");
	echo "$files[2]";
}
/*
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
			echo count($files);
		echo "<br> count of uploads folder is:".count($files1);
	}
 
?>
</html>
 
