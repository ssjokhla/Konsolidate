<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
include('myFunctions.php');

//echo "PHP Script ran\n";

$name = ($argv[1]);
$PackageName = $name.".tar.gz";

devPackage($name, "/var/Konsolidate/Pending/$PackageName", "", $PackageName);

?>
