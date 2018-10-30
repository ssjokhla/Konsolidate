<!DOCTYPE>
<html>
<style>
	table
	{
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}	

	td, th
	{
		border: 1px solid #dddddd;
		text-aline: left;
		padding: 8px;
	}
	tr:nth-child(even)
	{
		background-color: #dddddd;
	}
</style>


<table border = "1">
<?php
	include('/home/cong-danh/IT490/Konsolidate/rabbitmqphp_example/myFunctions.php');
	session_start();
	echo "Session started";
	$client = new rabbitMQClient("testRabbitMQ.ini","viewServer");
	echo "Client works";
	$therapist = $_SESSION["Therapist"];

	if(isset($_GET['reports']))
	{
		$request = array();
		$request['type'] = "view";
		$request['role'] = $therapist;
		$response = $client->send_request($request);
		$payload = json_encode($response);
		$array = json_decode($payload, true);
		//echo "IT REALLY WORKED:";
		//echo $payload;

		foreach($array as $key => $value)
		{	
			if($key != "password")
			{	
				echo "<th>" . $key . "</th>";

				foreach($value as $key2 => $value2)
				{	
					echo "<td>" . $value2 . "</td>";
				}
			}
		}
/*
		echo "<tr>";
		foreach($array as $key => $value)
		{		
			echo "<th>" . $key . "</th>";
		}
		echo "</tr>";

		foreach($array as $key => $value)
		{	
			foreach($value as $key2 => $value2)
			{	
				echo "<tr><td>" . $value2 . "</tr></td>";
			}
		}
*/
	}
?>
</table>
</html>
