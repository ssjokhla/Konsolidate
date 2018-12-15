#!/bin/bash

sed -i "/.*BROKER_HOST =.*/c\BROKER_HOST = $IP" /var/Konsolidate/Categories/Require/testRabbitMQ.ini          # This will be used by all other VMs to allow for connection

