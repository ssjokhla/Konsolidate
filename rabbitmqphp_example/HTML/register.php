<?php
	if(isset($_GET['Register']))
	{
		$username=$_GET['username'];
		$password=$_GET['password'];
		$role=$_GET['role'];
		$con = mysqli_connect("localhost", "admin", "password", "masterDB");
		mysqli_select_db($con, "masterDB");
		$s = "select * from members where username = '$username'";
		echo "SQL Statement: $s";
		$t = mysqli_query($con, $s);
		$rowCount = mysqli_num_rows($t);
		if($rowCount > 0)
		{
		  echo "Please Choose another username";
		  logError("This Username already taken");
		  return "Error"
		}
		else
		{
		$r = "Insert into members (Username, Password, Role)
		Values('$username','$password','$role')";
		$tr= mysqli_query($con,$r);
		return "Complete";
		}
	}
?>

<!DOCTYPE html>
	<style type>
	#body
	{
		height: 350px;
		width: 750px;
		margin: auto;
		border-style: ridge;
		border-width: 5px;
		border-radius: 25px;
		border-color: yellow black yellow black;
	}
	</style>

	<form action = "" method = "get">
	<center>
	<body id = "body">
		[Register] <br> 
	<div id = "D">
	<input type = text name = "username"  placeholder = "username" required autocomplete = "off"/>
		Enter Username: <br>
	<input type = text name = "password" placeholder = "password" required autocomplete = "off"/>
		Enter Password: <br>
		
		Choose Your Role:
		<select name="role" id="role">
			<option value="Patient">Patient</option>
			<option value="HCP">HCP</option>
			<option value="Researcher">Researcher</option
		</select> <br>
		
	<input type = submit name = "Register" value = "Button">
	</body>
	</form>
