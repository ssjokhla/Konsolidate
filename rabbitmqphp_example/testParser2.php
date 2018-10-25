#!/usr/bin/php
<?php
$con = mysqli_connect("localhost", "admin", "password", "masterDB");
mysqli_select_db($con, "masterDB");

$query = "LOAD DATA INFILE '/var/lib/mysql-files//sampleData.csv'
	INTO TABLE dataTable 
	FIELDS TERMINATED BY ',' 
	LINES TERMINATED BY '\n'";
 

mysqli_query($con, $query);
?>
