<?php
include('/home/qa/Konsolidate/rabbitmqphp_example/myFunctions.php');
session_start();

gateKeeperLogin("login.html");
//gateKeeperRole("login.html");
$_SESSION = array();

session_destroy();

setcookie("givenName", "", time() - 3600, "/");

print "Session has been terminated.";
pageLoader("login.html");
?>
