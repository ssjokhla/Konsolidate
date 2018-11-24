<?php

$name = shell_exec("whoami");

$ip = shell_exec("hostname -I | awk '{print $1}'");

echo $name . "@" . $ip;

?>
