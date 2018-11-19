<!DOCTYPE>
<html>
<head>
	<link href="boostrapcore.css" rel="stylesheet">
	<link rel="stylesheet" href="tstyle.css">
</head>
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

</style>

<body>
<div class = "content">
		<div id="title">
<h1 style="color: white;"><strong> <font color ="white"> P A T I E N T &nbsp  D A T A<strong></h1>
</font>
</div>
	<div id="login">
<table class="table">
<?php
	include('/home/qa/Konsolidate/rabbitmqphp_example/myFunctions.php');
	session_start();

	$client = new rabbitMQClient("testRabbitMQ.ini","viewServer");

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
			echo "<tr>";
			if($key != "password")
			{
				echo "<th><strong>" . $key . "</strong></th>";

				foreach($value as $key2 => $value2)
				{
					echo "<td>" . $value2 . "</td>";

				}

			}
				echo"</tr>";
		}

	}
?>
</table>
<form action = "http://192.168.0.106/HCPHTML.php">
<input class="btn btn-link btn-lg btn-block" type = submit value = "Back"/>
</form>
</div>
</div>
</body>
</html>
