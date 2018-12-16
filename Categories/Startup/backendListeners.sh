#!/bin/bash

#Backend Listeners
php /var/Konsolidate/Categories/Sessions/loginRabbitMQServer.php &
php /var/Konsolidate/Categories/Log/logRabbitMQServer.php &
php /var/Konsolidate/Categories/Register/regRabbitMQServer.php &
php /var/Konsolidate/Categories/Download/downRabbitMQServer.php &
php /var/Konsolidate/Categories/View/viewRabbitMQServer.php

#Deployment Listeners
#php ~/Konsolidate/rabbitmqphp_example/listeners/pushRabbitMQServer.php &
#php ~/Konsolidate/rabbitmqphp_example/listeners/devRabbitMQServer.php

#Frontend Listeners
~                                 
