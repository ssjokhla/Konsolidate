#!/bin/bash


inotifywait -r -e modify,create --format '%f' /var/Konsolidate/Categories/Failover/ChangeFile | while read FILE
do

        echo "File is named $FILE"

	IP=`cat $FILE`
	sed -i "/.*BROKER_HOST =.*/c\BROKER_HOST = $IP" /var/Konsolidate/Categories/Require/testRabbitMQ.ini          # This will be used by all other VMs to allow for connection

        echo "Yay this worked"

done

