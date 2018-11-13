#!/bin/bash

#Ask for listener username and IP
#read -p 'Listener (user@IP): ' listener

#Set up watcher on /uploads directory to watch for modified, created, or deleted files 
inotifywait -r -e modify,create,delete --format '%f' /home/deployment/Konsolidate/Bundler/Packages | while read FILE
do
	
	echo "File is named $FILE"


	sudo apt install $FILE
	echo "File has been unpackaged and installed"

done

/home/deployment/Konsolidate/rabbitmqphp_example/dePackager.sh $1
