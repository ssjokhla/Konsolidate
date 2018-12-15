#!/usr/bin/php
<?php
#$file = $argv[1];
$con = mysqli_connect("localhost", "admin", "password", "testDB");
mysqli_select_db($con, "testDB");

$query = "LOAD DATA LOCAL INFILE '/var/Konsolidate/Categories/RSync/FileTransfer/test.csv'
	INTO TABLE dataTable
	FIELDS TERMINATED BY ','
	LINES TERMINATED BY '\n'";


mysqli_query($con, $query);
?>
