<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
include('myFunctions.php');

$name = parse_str($argv[1]);
$version = parse_str($argv[2]);
$description = parse_str($argv[3]);

devPackage($name, $version, "/home/samish/IT490/Konsolidate/Bundler/files", "", $description);

?>
