<?php
include('/var/Konsolidate/Categories/Sessions/SessionFunctions.php');
session_start();
?>



<?php
	if(gateKeeperLogin("index.html") && gateKeeperRole("index.html", "researcher")){
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
<link rel="stylesheet" href="style.css">
</head>
<center>
<body>
	<div class="center">
	<div id="title">
		<h1 style="color: blue;"><strong>R E S E A R C H E R S<strong></h1>
		</div>


		<div class = "row">
		<div class = "col-1">
		</div>
		<div class = "col-10">


		  <div id="login">
				<form action = "DownloadProcess.php" method = "get">
					<h3 style="color:#007bff;text-align:center">Download Patient Data</h3>
					<br><input  class="btn btn-lg btn-primary btn-block" type = submit value = "Download" name = "down">
				</form>
				<form action = "logout.php" method = "get">
					<br><input  class="btn btn-lg btn-primary btn-block" type = submit value = "Logout">
				</form>


		</div>
		<div class = "col-1">
		</div>
		</div>
</div>
</body>
</div>
</div>
</html>

<?php
	}
?>
