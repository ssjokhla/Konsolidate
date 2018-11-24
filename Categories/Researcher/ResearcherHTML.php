<?php
include('~/Konsolidate/Categories/Sessions/SessionFunctions.php');
session_start();
?>



<?php
	if(gateKeeperLogin("~/Konsolidate/Categories/Sessions/login.html") && gateKeeperRole("~/Konsolidate/Categories/Sessions/login.html", "researcher")){
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
<center>
<body>
	<div id="title">
		<h1 style="color: blue;"><strong>R E S E A R C H E R S<strong></h1>
		</div>
		  <div id="login">
				<form action = "~/Konsolidate/Categories/Download/DownloadProcess.php" method = "get">
					<h3 style="color:#007bff;text-align:center">Download Patient Data</h3>
					<br><input  class="btn btn-lg btn-primary btn-block" type = submit value = "Download" name = "down">
				</form>
				<form action = "~/Konsolidate/Categories/Sessions/logout.php" method = "get">
					<br><input  class="btn btn-lg btn-primary btn-block" type = submit value = "Logout">
				</form>
</div>
</body>
</div>
</html>

<?php
	}
?>
