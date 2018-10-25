#!/bin/bash

read -p 'Listerner: ' listener
read -sp 'Password: ' password

while inotifywait -r -e modify,create,delete /var/www/html/uploads; do
	rsync -av --remove-source-files /var/www/html/uploads/ $listener:~/IT490/Konsolidate/rabbitmqphp_example/HTML/test/
done


