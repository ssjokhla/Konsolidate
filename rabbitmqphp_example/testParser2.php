#!/usr/bin/php
<?php
$con = mysqli_connect("localhost", "admin", "password", "testDataDB");
mysqli_select_db($con, "testDataDB");

$query = "LOAD DATA INFILE '/var/lib/mysql-files//testData.csv'
	INTO TABLE testData 
	FIELDS TERMINATED BY ',' 
	LINES TERMINATED BY '\n'";
 

mysqli_query($con, $query);
?>
