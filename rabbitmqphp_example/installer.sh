#!/bin/bash

#Ask for listener username and IP
#read -p 'Listener (user@IP): ' listener

#Set up watcher on /uploads directory to watch for modified, created, or deleted files 
inotifywait -r -e modify,create,delete --format '%f' /var/Konsolidate/Pending | while read FILE
do
	sleep 3        
        echo "File is named $FILE"
	tar -C /var/Konsolidate/Pending/toInstall -zxvf /var/Konsolidate/Pending/$FILE
	rm -r /var/Konsolidate/Pending/toInstall/*

done

/var/Konsolidate/installer.sh

