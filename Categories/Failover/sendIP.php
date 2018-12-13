<?php

require_once('/var/Konsolidate/Categories/Require/Path.inc');
require_once('/var/Konsolidate/Categories/Require/get_host_info.inc');
require_once('/var/Konsolidate/Categories/Require/rabbitMQLib.inc');

$IP = ($argv[1]);

$client = new rabbitMQClient("testRabbitMQ.ini", "IPServer");
$request = array();
$request['type'] = "IP";
$request['IP'] = $IP;
$client->send_request($request);
