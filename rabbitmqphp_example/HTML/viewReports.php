<!DOCTYPE>
<html>
<style>
	table
	{
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}	

	td, th
	{
		border: 1px solid #dddddd;
		text-aline: left;
		padding: 8px;
	}
	tr:nth-child(even)
	{
		background-color: #dddddd;
	}
</style>


<table border = "1">
<?php
	session_start();
  	$con = mysqli_connect("localhost", "admin", "password", "testDB");
   	mysqli_select_db($con, "testDB");
	//$s = "select * from members";
	$therapist = $_SESSION["Therapist"];
	$s = "select * from members where Therapist = '$therapist'";
    	$t = mysqli_query($con, $s);
    	$rowCount = mysqli_num_rows($t);

	for($i = 0; $i < 3; $i++)
	{
		$fetch = mysqli_fetch_field($t);
		if($fetch->name != "password")						//Subjected to change depending on Role
		{
			echo "<th>" . $fetch->name . "</th>";
			echo "          ";
		}
	}
	


	while($rowsPer = mysqli_fetch_array($t))
	{
		echo "<tr><td>" . $rowsPer[0] . "</td>";

		for($i = 2; $i < 3; $i++)		// set limit to how many columns there are.  Setup to skip Password column with initial "i" value.
		{
			echo "<td>" . $rowsPer[$i] . "</td>";
			//echo "<br />\n";
		}

	}
?>
</table>
</html>
