<?php

require_once('~/Konsolidate/Categories/Require/Path.inc');
require_once('~/Konsolidate/Categories/Require/get_host_info.inc');
require_once('~/Konsolidate/Categories/Require/rabbitMQLib.inc');
include('~/Konsolidate/Categories/Bundler/PackageFunctions.php');

//echo "PHP Script ran\n";

$name = ($argv[1]);
$version = ($argv[2]);
$description = ($argv[3]);

echo $name;
echo $version;
echo $description;

devPackage($name, $version, "~/IT490/Konsolidate/Bundler/files", "", $description);

?>
