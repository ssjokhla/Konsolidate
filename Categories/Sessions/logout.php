<?php
include('/var/Konsolidate/Categories/Sessions/SessionFunctions.php');
session_start();

gateKeeperLogin("index.html");
//gateKeeperRole("index.html");
$_SESSION = array();

session_destroy();

setcookie("givenName", "", time() - 3600, "/");

print "Session has been terminated.";
pageLoader("index.html");
?>
