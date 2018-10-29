#!/bin/bash

#Ask for listener username and IP
#read -p 'Listener (user@IP): ' listener

#Set up watcher on /uploads directory to watch for modified, created, or deleted files 
echo "Listener: $1"
inotifywait -r -e modify,create,delete --format '%f' /var/lib/mysql-files | while read FILE
do
	
	echo "File is named $FILE"


	#Sync files to the listeners directory while simultaneously deleting it from local directory
	rsync -av --remove-source-files /var/lib/mysql-files/ $1:/var/www/html/downloads/
	echo "Yay this worked"

done

~/IT490/Konsolidate/rabbitmqphp_example/rdownload.sh $1
