<?php
include('~/Konsolidate/Categories/Sessions/SessionFunctions.php');
session_start();
?>




<?php
if(gateKeeperLogin("~/Konsolidate/Categories/Sessions/login.html") && gateKeeperRole("~/Konsolidate/Categories/Sessions/login.html", "hcp")){
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
<link href="~/Konsolidate/Categories/Styling/boostrapcore.css" rel="stylesheet">
<link rel="stylesheet" href="~/Konsolidate/Categories/Styling/tstyle.css">
</head>
<div id="title">
	<h1 style="color: white;"><strong>H C P<strong></h1>
	</div>
	  <div id="login">
	<form action = "~/Konsolidate/Categories/Upload/UploadProcess.php" method = "post" enctype = "multipart/form-data">
		  <h1 style="color:#007bff;text-align:center">Choose a File</h1>
		 <input class="btn btn-lg btn-primary btn-block" type = "file" name = "myFile" id = "myFile"><br><br>

		<input class="btn btn-lg btn-primary btn-block" type = "submit" value = "Upload File" name = "submit">
	</form>


	<form action = "~/Konsolidate/Categories/View/viewReports.php" method = "get">
		<br><input class="btn btn-lg btn-primary btn-block" type = submit value = "View Reports" name = "reports">
	</form>


	<form action = "~/Konsolidate/Categories/Sessions/logout.php" method = "get">
		<br><input class="btn btn-lg btn-primary btn-block" ondragover="" type = submit value = "Logout">
	</form>

<?php

	$client = new rabbitMQClient("~/Konsolidate/Categories/Require/testRabbitMQ.ini","downServer");
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
</html>
<?php
	#encapsulating HTML so that gateKeeper works
}
?>
