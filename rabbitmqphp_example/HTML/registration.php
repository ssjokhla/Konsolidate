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

<!--	<form action = "" method = "get"> -->
	<form action = "registrationChecker.php" method = "get">
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
			<option value="patient">Patient</option>
			<option value="HCP">HCP</option>
			<option value="researcher">Researcher</option>
		</select> <br>
		
	<input type = submit name = "Register" value = "Register">
	</form>

	<form action = "login.html" method = "get">
	<input type = submit value = "Back"/>
	</form>

<!--
	<br><br><br><a href = "login.html"> [Back to Homepage] </a>

	<button onclick = "message()" name = "Register" value = "Register">Submit</button>
	
	<script type= "text/javascript" >
	var success = "<?php echo $success; ?>";
	function message()
	{	
		if($success == 1)
		{
			alert("Successfully made Account!");
		}
		else
		{
			alert("Please use another username");
		}
	}
	</script>

	</body>
	</form>
-->
