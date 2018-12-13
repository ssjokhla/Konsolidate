#!/bin/bash

#Backend Listeners
php ~/IT490/Konsolidate/rabbitmqphp_example/listeners/loginRabbitMQServer.php &
php ~/IT490/Konsolidate/rabbitmqphp_example/listeners/logRabbitMQServer.php &
php ~/IT490/Konsolidate/rabbitmqphp_example/listeners/regRabbitMQServer.php &
php ~/IT490/Konsolidate/rabbitmqphp_example/listeners/viewRabbitMQServer.php

#Deployment Listeners
#php ~/Konsolidate/rabbitmqphp_example/listeners/pushRabbitMQServer.php
#php ~/Konsolidate/rabbitmqphp_example/listeners/devRabbitMQServer.php & 
