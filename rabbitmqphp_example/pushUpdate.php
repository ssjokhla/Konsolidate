<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
include('myFunctions.php');

echo "updatingQA Script ran\n";

$destination = ($argv[1]);
$category = ($argv[2]);

echo "$category";

pushUpdate($destination, $category);
