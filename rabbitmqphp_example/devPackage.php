<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
include('myFunctions.php');

//echo "PHP Script ran\n";

$name = ($argv[1]);
$version = ($argv[2]);
$description = ($argv[3]);

$PackageName = $name . ".tar.gz";

devPackage($name, $version, "~/IT490/Konsolidate/Bundler/files", "", $description, $PackageName);

?>
