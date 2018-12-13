#!/bin/bash

#sudo watch -n 1 ~/Konsolidate/failover.sh  (This will run the script every second)

ping -c1 192.168.0.105 > /dev/null		#The "c" represents how many pings to send.

if [ $? -eq 0 ]; then				#If the ping went through, zero will result.
{
	echo "Currently working: $(date)"
}
else
{	
	echo "Currently not working: $(date)"
	IP=$(hostname -I)			#Grabs the IP of this system.
	echo "Switching to: $IP"

	php /var/Konsolidate/Categories/Failover/sendIP.php $IP



	#sed -i "/.*BROKER_HOST =.*/c\BROKER_HOST = $IP" /var/Konsolidate/Categories/Require/testRabbitMQ.ini		This will be used by all other VMs to allow for connection
}
fi
