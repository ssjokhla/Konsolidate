#!/bin/bash

#sudo watch -n 1 ~/Konsolidate/Categories/Failover/pinger.sh # (This will run the script every second)

ping -c1 192.168.0.107 > /dev/null              #The "c" represents how many pings to send.

if [ $? -eq 0 ]; then                           #If the ping went through, zero will result.
{
        echo "Currently working: $(date)"
}
else
{
	echo "Currently not working: $(date)"
        hostname -I > /var/Konsolidate/Categories/Failover/backEndIP.txt
        scp backEndIP.txt qa@192.168.0.108:/var/Konsolidate/Categories/Failover/ChangeFile
}
fi
