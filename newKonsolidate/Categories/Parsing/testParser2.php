#!/usr/bin/php
<?php
$file = $argv[1];
$con = mysqli_connect("localhost", "admin", "password", "masterDB");
mysqli_select_db($con, "masterDB");

$query = "LOAD DATA LOCAL INFILE '/var/Konsolidate/Categories/RSync/FileTransfer/$file'
	INTO TABLE dataTable
	FIELDS TERMINATED BY ','
	LINES TERMINATED BY '\n'";


mysqli_query($con, $query);
?>
