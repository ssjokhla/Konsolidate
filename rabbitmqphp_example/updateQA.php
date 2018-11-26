<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
include('myFunctions.php');

echo "updatingQA Script ran\n";

$category = ($argv[1]);
$version = ($argv[2]);

echo "$category";
echo "$version";

updateQA($category, $version);
