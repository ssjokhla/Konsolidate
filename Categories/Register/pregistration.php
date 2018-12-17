<?php

include('/var/Konsolidate/Categories/Sessions/SessionFunctions.php');
session_start();
if(gateKeeperLogin("login.html") && gateKeeperRole("login.html", "HCP")){

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
	<div class="center">
	<div class="content">
<div id="title">
	<h1 style="color: Blue;"><strong>K O N S O L I D A T E<strong></h1>
</div>

		<div id="login">
      <h1 style="color:#007bff;text-align:center">Register a Patient</h1><br>

<!--	<form action = "" method = "get"> -->
	<form action = "pRegistrationChecker.php" method = "get">
	<center>
	<input type = text name = "username"  placeholder = "Username" required autocomplete = "off"/>
	<br><br>
	<input type = password name = "password" placeholder = "Password" required autocomplete = "off"/>
	<br><br>
	<!-- Newly Added Fields for Searching Add to Insert Statment and DB-->
	<font color=#007bff>Patient Group:</font>
	<input type = number name = "group" required autocomplete = "off"/>
	<br><br>
	<div id="centerText">
		<font color=#007bff>Age:</font>
		<input type = number name = "age" required autocomplete = "off"/>
		<br><br>
		<font color=#007bff>Gender:</font>
			<div class="btn-group">
				<select name="gender" id="gender" class="btn btn-sm btn-primary btn-block">
					<option value="0">Male</option>
					<option value="1">Female</option>
				</select>
			</div>
			<br><br>
			<font color=#007bff>Day of Stroke:</font>
		<input type = number name = "TTS" required autocomplete = "off"/>
			<br><br>
				<font color=#007bff> Affected Hand:</font>
				<div class="btn-group">
					<select name="aHand" id="aHand" class="btn btn-sm btn-primary btn-block">
						<option value="0">Left</option>
						<option value="1">Right</option>
					</select>
				</div>
				<br><br>
			<font color=#007bff>	Dominant Hand(s):</font>
					<div class="btn-group">
						<select name="dHand" id="dHand" class="btn btn-sm btn-primary btn-block">
							<option value="left">Left</option>
							<option value="right">Right</option>
							<option value="both">Both</option>
						</select>
					</div>
				<br><br>
		</div>
			<input type = password name = "lLocation" placeholder = "Lesion Location" required autocomplete = "off"/>



	<br><br><input class="btn btn-lg btn-primary btn-block" type = submit name = "pRegister" value = "Register"> <br>
	</form>

	<form action = "HCPHTML.php" method = "get">
	<input class="btn btn-lg btn-primary btn-block" type = submit value = "Back"/>
	</form>
</div>
</div>
</div>
</body>
</html>
<?php
	#encapsulating HTML so that gateKeeper works
}
?>
