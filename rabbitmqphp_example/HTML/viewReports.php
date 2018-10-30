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
/*
	if(isset($_GET['reports']))
	{
		$request = array();
		$request['type'] = "view";
		$request['role'] = $therapist;
		$response = $client->send_request($request);
		$payload = json_encode($response);
		//echo "IT REALLY WORKED:";
		echo $payload;
	}
*/
	echo pullTable();
	//echo "WORK";
		
/*
	for($i = 0; $i < 3; $i++)
	{
		$fetch = mysqli_fetch_field($t);
		if($fetch->name != "password")						//Subjected to change depending on Role
		{
			echo "<th>" . $fetch->name . "</th>";
			echo "          ";
		}
	}
	


	while($rowsPer = mysqli_fetch_array($t))
	{
		echo "<tr><td>" . $rowsPer[0] . "</td>";

		for($i = 2; $i < 3; $i++)		// set limit to how many columns there are.  Setup to skip Password column with initial "i" value.
		{
			echo "<td>" . $rowsPer[$i] . "</td>";
			//echo "<br />\n";
		}

	}
*/
?>
</table>
</html>
