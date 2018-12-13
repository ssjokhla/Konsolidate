<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
include('myFunctions.php');

echo "rollback.sh Script ran\n";

$category = ($argv[1]);
$destination = ($argv[2]);

rollback($destination, $category);
