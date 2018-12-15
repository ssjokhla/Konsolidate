#!/bin/bash
 
if [ ! -f /var/Konsolidate/Categories/Failover/ChangeFile/backEndIP.txt ]; then
{	
		inotifywait -r -e modify,create --format '%f' /var/Konsolidate/Categories/Failover/ChangeFile | while read FILE 
	do
		sleep 5s
		echo "File is named $FILE"

		IPR=`cat /var/Konsolidate/Categories/Failover/ChangeFile/$FILE`

		sudo sed -i "/.*BROKER_HOST =.*/c\BROKER_HOST = $IPR" /var/Konsolidate/Categories/Require/testRabbitMQ.ini          # This will be used by all other VMs to allow for connection

		echo "Yay this worked"

	done
}
fi
sudo /var/Konsolidate/Categories/Failover/changer.sh
