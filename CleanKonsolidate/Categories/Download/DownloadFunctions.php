<?php
require_once('~/Konsolidate/Categories/Require/path.inc');
require_once('~/Konsolidate/Categories/Require/get_host_info.inc');
require_once('~/Konsolidate/Categories/Require/rabbitMQLib.inc');

//Function called when user wants to download a file
function doDownload()
{
        $con = mysqli_connect("localhost", "admin", "password", "masterDB");
        mysqli_select_db($con, "masterDB");

	//Checking if connected to database
        if (!$con){
                logError("Connection Failed: " . mysqli_connect_error());
                die("Connection failed: " . mysqli_connect_error());
        }

	//SQL query sent to database to send contents of dataTable to another directory, that directory will forward it to apache server for download
        $s = "select * from dataTable INTO OUTFILE '/var/lib/mysql-files/dataTable.csv' Fields enclosed BY '' Terminated by ',' escaped by '\"' Lines Terminated By '\r\n'";
        $t = mysqli_query($con, $s);
}
