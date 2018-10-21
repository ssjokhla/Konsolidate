#!/usr/bin/php
<?php
$con = mysqli_connect("localhost", "admin", "password", "masterDB");
mysqli_select_db($con, "masterDB");
for($counter = 0; $counter < 83; $counter++)
{
	//echo "\nEnter Column Name:  ";
	//$handle = fopen ("php://stdin","r");
	//$line = fgets($handle);
	$line = readline("\nEnter Column Name: ");
	$query = "ALTER TABLE `dataTable` ADD `$line` FLOAT(20) NOT NULL;";
	//echo "\n$line";
	mysqli_query($con, $query);
	//echo "Column was added.";
}



?>

