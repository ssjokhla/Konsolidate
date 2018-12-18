#!/bin/bash
		sudo sed -i "/.*BROKER_HOST =.*/c\BROKER_HOST = 192.168.0.114" /var/Konsolidate/Categories/Require/testRabbitMQ.ini          # This will be used by all other VMs to allow for connection
