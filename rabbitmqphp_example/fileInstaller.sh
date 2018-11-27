#!/bin/bash

#Ask for listener username and IP
#read -p 'Listener (user@IP): ' listener

#Set up watcher on /uploads directory to watch for modified, created, or deleted files 
echo "Listener: $1"
inotifywait -r -e modify,create,delete --format '%f' /var/Konsolidate/Pending/ | while read FILE
do
	
	echo "Tar file is called $FILE "
	tar -C /var/Konsolidate/Pending/toInstall -xvf $FILE

	cp -r /var/Konsolidate/Pending/toInstall/* /

	#Sync files to the listeners directory while simultaneously deleting it from local directory
	#rsync -av --remove-source-files /var/www/html/uploads/ $1:~/IT490/Konsolidate/rabbitmqphp_example/RSync/

	#SSH into listener then run the parser file
	#ssh $1 /home/samish/IT490/Konsolidate/rabbitmqphp_example/testParser2.php $FILE

done

~/Konsolidate/rabbitmqphp_example/rsender.sh $1
