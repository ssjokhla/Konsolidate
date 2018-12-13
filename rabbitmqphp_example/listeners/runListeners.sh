#!/bin/bash

#php ~/IT490/Konsolidate/rabbitmqphp_example/listeners/categoryInfo.php &
php ~/Konsolidate/rabbitmqphp_example/listeners/devRabbitMQServer.php & 
#php ~/IT490/Konsolidate/rabbitmqphp_example/listeners/downRabbitMQServer.php &
#php ~/IT490/Konsolidate/rabbitmqphp_example/listeners/loginRabbitMQServer.php &
#php ~/IT490/Konsolidate/rabbitmqphp_example/listeners/logRabbitMQServer.php &
php ~/Konsolidate/rabbitmqphp_example/listeners/pushRabbitMQServer.php
#php ~/IT490/Konsolidate/rabbitmqphp_example/listeners/regRabbitMQServer.php &
#php ~/IT490/Konsolidate/rabbitmqphp_example/listeners/viewRabbitMQServer.php

