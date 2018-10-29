<?php
include('/home/chris/490project/Konsolidate/rabbitmqphp_example/myFunctions.php');
	if(isset($_GET['Register']))
	{
		$success = 0;
		$username=$_GET['username'];
		$password=$_GET['password'];
		$role=$_GET['role'];
		$con = mysqli_connect("localhost", "admin", "password", "masterDB");
		mysqli_select_db($con, "masterDB");
		$s = "select * from members where username = '$username'";
	//	echo "SQL Statement: $s";
		$t = mysqli_query($con, $s);
		$rowCount = mysqli_num_rows($t);
		if($rowCount > 0)
		{
		  	echo "Please Choose another username";
		  	logError("Username already in database");
			//return "Error";
			pageLoader("registration.php");
		}
		else
		{
			$success = 1;
			$r = "Insert into members (username, password, role)
			Values('$username', SHA2('$password',512),'$role')";
			$tr= mysqli_query($con,$r);
			//return "Complete";
			echo "Sucessfully created Account! :>";
			pageLoader("login.html");
		}
	}
?>
