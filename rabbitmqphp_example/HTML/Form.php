<?php
include ("Account.php");
/*MAIN PROGRAM*/
$db = mysqli_connect($hostname, $username, $password, $project);
mysqli_select_db($db, $project);

$user = mysql_real_escape_string($_POST['user']);
$password = hash('sha256', mysql_real_escape_string($_POST['password']));

$sql = mysql_query("SELECT * FROM XXX_table  WHERE XXX  = '$user' AND XXX = '$password');

