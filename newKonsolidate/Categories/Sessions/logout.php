<?php
include('~/Konsolidate/Categories/Sessions/SessionFunctions.php');
session_start();

gateKeeperLogin("login.html");
//gateKeeperRole("login.html");
$_SESSION = array();

session_destroy();

setcookie("givenName", "", time() - 3600, "/");

print "Session has been terminated.";
pageLoader("login.html");
?>
