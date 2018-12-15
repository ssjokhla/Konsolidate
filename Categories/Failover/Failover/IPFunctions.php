<?php

require_once('/var/Konsolidate/Categories/Require/Path.inc');
require_once('/var/Konsolidate/Categories/Require/get_host_info.inc');
require_once('/var/Konsolidate/Categories/Require/rabbitMQLib.inc');

//Replaces IP in .ini file
function changeIP($IP)
{
	shell_exec('sed -i "/.*BROKER_HOST =.*/c\BROKER_HOST = $IP" /var/Konsolidate/Categories/Require/testRabbitMQ.ini');
}
