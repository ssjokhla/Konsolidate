#!/bin/bash

#IPR=`cat /var/Konsolidate/Categories/Failover/ChangeFile/backEndIP.txt`
#echo $IPR
sed -i "/.*BROKER_HOST =.*/c\BROKER_HOST = empty" /var/Konsolidate/Categories/Require/testRabbitMQ.ini          # This will be used by all other VMs to allow for connection

        echo "Yay this worked"

