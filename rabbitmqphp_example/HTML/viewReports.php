<?php

	echo "[User Reports]";
	echo "<br />\n";
  	$con = mysqli_connect("localhost", "admin", "password", "testDB");
   	mysqli_select_db($con, "testDB");
    	$s = "select * from members";
    	$t = mysqli_query($con, $s);
    	$rowCount = mysqli_num_rows($t);
	//$rowsPer = mysqli_fetch_array($t);

	while($rowsPer = mysqli_fetch_array($t))
	{
		echo $rowsPer[0];

	for($i = 2; $i < 3; $i++)		// set limit to how many columns there are.  Setup to skip Password column with initial "i" value.
	{
		echo $rowsPer[$i];
		echo "<br />\n";
	}
}
?>
