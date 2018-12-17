
<?php
/*
include('/home/cong-danh/IT490/Konsolidate/rabbitmqphp_example/myFunctions.php');
	if(isset($_GET['Register']))
	{
		$success = 0;
		$username=$_GET['username'];
		$password=$_GET['password'];
		$role=$_GET['roles'];
		$con = mysqli_connect("localhost", "admin", "password", "testDB");
		mysqli_select_db($con, "testDB");
		$s = "select * from members where username = '$username'";
	//	echo "SQL Statement: $s";
		$t = mysqli_query($con, $s);
		$rowCount = mysqli_num_rows($t);
		if($rowCount > 0)
		{
		  	//echo "Please Choose another username";
		  	logError("Username already in database");
			//return "Error";
		}
		else
		{
			$success = 1;
			$r = "Insert into members (username, password, roles)
			Values('$username', SHA2('$password',512),'$role')";
			$tr= mysqli_query($con,$r);
			//return "Complete";
		}
	}
 */
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
	<div class="content">
<div class="center">
<div id="title">
	<h1 style="color: Blue;"><strong>K O N S O L I D A T E<strong></h1>
</div>


	<div class = "row">
	<div class = "col-1">
	</div>
	<div class = "col-10">


		<div id="login">
      <h1 style="color:#007bff;text-align:center">Register</h1><br>

<!--	<form action = "" method = "get"> -->
	<form action = "RegistrationChecker.php" method = "get">
	<center>
	<input type = text name = "username"  placeholder = "Username" required autocomplete = "off"/>
	<br><br>
	<input type = password name = "password" placeholder = "Password" required autocomplete = "off"/>
	<br><br>

	<p style="color:#007bff;text-align:center"><big>Choose your role:</big></p>
		<div class="btn-group">
		<select name="role" id="role" class="btn btn-lg btn-primary btn-block">
			<option value="HCP">HCP</option>
			<option value="researcher">Researcher</option>
		</select>
	</div>



	<br><br><input class="btn btn-lg btn-primary btn-block" type = submit name = "Register" value = "Register"> <br>
	</form>

	<form action = "login.html" method = "get">
	<input class="btn btn-lg btn-primary btn-block" type = submit value = "Back"/>
	</form>

	
	</div>
	<div class = "col-1">
	</div>
	</div>
</div>
</div>
</div>
</body>
</html>
