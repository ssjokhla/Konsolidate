#!/bin/bash

#sudo watch -n 1 ~/Konsolidate/Categories/Failover/pinger.sh # (This will run the script every second)

ping -c1 192.168.0.108 > /dev/null              #The "c" represents how many pings to send.

if [ $? -eq 0 ]; then                           #If the ping went through, zero will result.
{
        echo "Currently working: $(date)"
}
else
{
        echo "Currently not working: $(date)"
        hostname -I > backEndIP.txt
        #IP=$(hostname -I)                      #Grabs the IP of this system.

        scp backEndIP.txt chris@192.168.0.100:/var/ChangeFile
}
fi

