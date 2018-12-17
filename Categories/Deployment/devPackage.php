<?php

require_once('/var/Konsolidate/Categories/Require/path.inc');
require_once('/var/Konsolidate/Categories/Require/get_host_info.inc');
require_once('/var/Konsolidate/Categories/Require/rabbitMQLib.inc');
include('/var/Konsolidate/Categories/Deployment/DeploymentFunctions.php');

//echo "PHP Script ran\n";

$name = ($argv[1]);
$PackageName = $name.".tar.gz";

devPackage($name, "/var/Konsolidate/Pending/$PackageName", "", $PackageName);

?>
