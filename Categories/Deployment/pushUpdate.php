<?php

require_once('/var/Konsolidate/Categories/Require/path.inc');
require_once('/var/Konsolidate/Categories/Require/get_host_info.inc');
require_once('/var/Konsolidate/Categories/Require/rabbitMQLib.inc');
include('/var/Konsolidate/Categories/Deployment/DeploymentFunctions.php');

echo "updatingQA Script ran\n";

$destination = ($argv[1]);
$category = ($argv[2]);

echo "$category";

pushUpdate($destination, $category);
