<?php
include('/home/qa/Konsolidate/rabbitmqphp_example/myFunctions.php');
session_start();
?>




<?php
if(gateKeeperLogin("login.html") && gateKeeperRole("login.html", "hcp")){
?>
<!DOCTYPE html>
<html lang="en">
<div class="content">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Particles Login</title>
  <!-- Bootstrap core CSS -->
<link href="boostrapcore.css" rel="stylesheet">
<link rel="stylesheet" href="tstyle.css">
</head>
<div id="title">
	<h1 style="color: blue;"><strong>H C P<strong></h1>
	</div>
	  <div id="login">
	<form action = "UploadProcess.php" method = "post" enctype = "multipart/form-data">
		  <h1 style="color:#007bff;text-align:center">Choose a File</h1>
		 <input class="btn btn-lg btn-primary btn-block" type = "file" name = "myFile" id = "myFile"><br><br>
		<input class="btn btn-lg btn-primary btn-block" type = "submit" value = "Upload File" name = "submit">
	</form>


	<form action = "viewReports.php" method = "get">
		<br><input class="btn btn-lg btn-primary btn-block" type = submit value = "View Reports" name = "reports">
	</form>


	<form action = "logout.php" method = "get">
		<br><input class="btn btn-lg btn-primary btn-block" ondragover="" type = submit value = "Logout">
	</form>

<?php

	$client = new rabbitMQClient("testRabbitMQ.ini","downServer");
	$request = array();
	$request['type'] = "down";
//	$response = $client -> send_request($request);
	$files = scandir("/var/www/html/downloads/");
	$files1 = scandir("/var/www/html/uploads/");
	//echo "$files[2]";
	for($i=2; $i < count($files); $i++)
	{
?>
<p>
	<a href="downloads/
<?php
		echo $files[$i]
			?>"><?php echo $files[$i] ?></a>
			</p>
<?php
			echo count($files);
		echo "<br> count of uploads folder is:".count($files1);
	}

?>
</div>
</body>
</div>
</html>
<?php
	#encapsulating HTML so that gateKeeper works
}
?>
