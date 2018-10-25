

#Ask for listener username and IP
read -p 'Listerner (user@IP): ' listener
#read -sp 'Password: ' password

#Set up watcher on /uploads directory to watch for modified, created, or deleted files 
while inotifywait -r -e modify,create,delete /var/www/html/uploads; do

	#Sync files to the listeners directory while simultaneously deleting it from local directory
	rsync -av --remove-source-files /var/www/html/uploads/ $listener:~/IT490/Konsolidate/rabbitmqphp_example/RSync/

done
