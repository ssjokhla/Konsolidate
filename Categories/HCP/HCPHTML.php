<?php
include('/var/Konsolidate/Categories/Sessions/SessionFunctions.php');
session_start();
?>




<?php
if(gateKeeperLogin("index.html") && gateKeeperRole("index.html", "HCP")){
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Particles Login</title>
  <!-- Bootstrap core CSS -->
<link href="boostrapcore.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-fluid">
<div class="center">
<div id="title">
	<h1 style="color: white;"><strong>H C P<strong></h1>
	</div>
	<div class ="row">

	<div class ="col-1">

	</div>

	<div class ="col-10">
	  <div id="login">
	<form action = "UploadProcess.php" method = "post" enctype = "multipart/form-data">
		  <h1 style="color:#007bff;text-align:center">Choose a File</h1>
		 <input class="btn btn-lg btn-primary btn-block" type = "file" name = "myFile" id = "myFile"><br><br>

		<input class="btn btn-lg btn-primary btn-block" type = "submit" value = "Upload File" name = "submit">
	</form>


	<form action = "viewReports.php" method = "get">
		<br><input class="btn btn-lg btn-primary btn-block" type = submit value = "View Reports" name = "reports">
	</form>
	<br>
	<div class=test><br>
        	<form action = "pregistration.php" method="get">
       		<button class="btn btn-lg btn-primary btn-block" type="submit">Register Patient Here </button>
      		</form>
      	</div>


	<form action = "logout.php" method = "get">
		<br><input class="btn btn-lg btn-primary btn-block" ondragover="" type = submit value = "Logout">
	</form>
</div>
</div>

<div class ="col-1">

</div>


<?php

	$client = new rabbitMQClient("testRabbitMQ.ini","downServer");
	$request = array();
	$request['type'] = "down";
//	$response = $client -> send_request($request);
	$files = scandir("/var/www/html/downloads/");
	$files1 = scandir("/var/www/html/uploads/");
	//echo "$files[2]";
	?>
</div>
</body>
</div>
</div>

</html>
<?php
	#encapsulating HTML so that gateKeeper works
}
?>
