#!/bin/bash
echo "Please type in whether you are a Backend or Frontend followed by [ENTER] key:"

read value
output="${value,,}"
fe="frontend"
be="backend"


if [ "$output" == "$be" ]; then
{
	mkdir /var/Konsolidate/
	mkdir /var/Konsolidate/Categories/
	mkdir /var/Konsolidate/Extras/
	mkdir /var/Konsolidate/Pending
	mkdir /var/Konsolidate/Pending/toInstall
	mkdir /var/Konsolidate/Trashed
	mkdir /var/Konsolidate/Pending

	
	mkdir /var/Konsolidate/Categories/Bundler
	mkdir /var/Konsolidate/Categories/Database
	mkdir /var/Konsolidate/Categories/Deployment
	mkdir /var/Konsolidate/Categories/Download
	mkdir /var/Konsolidate/Categories/Log
	mkdir /var/Konsolidate/Categories/Parsing
	mkdir /var/Konsolidate/Categories/Register
	mkdir /var/Konsolidate/Categories/Require
	mkdir /var/Konsolidate/Categories/RSync
	mkdir /var/Konsolidate/Categories/RSync/FileTransfer
	mkdir /var/Konsolidate/Categories/Sessions
	mkdir /var/Konsolidate/Categories/Upload
	mkdir /var/Konsolidate/Categories/View
	mkdir /var/Konsolidate/Categories/Startup
	mkdir /var/Konsolidate/Categories/Failover
	mkdir /var/Konsolidate/Categories/Failover/ChangeFile

	chmod 777 /var/Konsolidate/Pending
	chmod 777 /var/Konsolidate/Pending/toInstall
	chmod 777 /var/Konsolidate/Categories/RSync/FileTransfer
	chmod 777 /var/Konsolidate/Categories/Failover/ChangeFile

#Files for Extras/Pending/Trashed directory
	cp -r Extras/* /var/Konsolidate/Extras/
#	cp -r newKonsolidate/Pending/* /var/KonsolidateTesting/Pending/
	cp -r Trashed/* /var/Konsolidate/Trashed/



#Files within Bundler directory
	cp Categories/Bundler/createBundle.sh /var/Konsolidate/Categories/Bundler/
	cp Categories/Bundler/createTar.sh /var/Konsolidate/Categories/Bundler/
	cp Categories/Bundler/devPackage.php /var/Konsolidate/Categories/Bundler/
	cp -r Categories/Bundler/files /var/Konsolidate/Categories/Bundler/
	cp Categories/Bundler/PackageFunctions.php /var/Konsolidate/Categories/Bundler/
	cp -r Categories/Bundler/Packages /var/Konsolidate/Categories/Bundler/

#Files within Database directory
	cp Categories/Database/addTonsOfColumns.php /var/Konsolidate/Categories/Database/
	cp Categories/Database/Database.sql /var/Konsolidate/Categories/Database/

#Files within Deployment directory
	cp Categories/Deployment/depRabbitMQServer.php /var/Konsolidate/Categories/Deployment/
	cp Categories/Deployment/pushRabbitMQServer.php /var/Konsolidate/Categories/Deployment/
	cp Categories/Deployment/DeploymentFunctions.php /var/Konsolidate/Categories/Deployment/
	cp Categories/Deployment/devPackage.php /var/Konsolidate/Categories/Deployment/
	cp Categories/Deployment/Packager.sh /var/Konsolidate/Categories/Deployment/
	cp Categories/Deployment/pushUpdate.php /var/Konsolidate/Categories/Deployment/
	cp Categories/Deployment/pushUpdate.sh /var/Konsolidate/Categories/Deployment/
	cp Categories/Deployment/installPackage.sh /var/Konsolidate/Categories/Deployment/

#Files within Download directory
	cp Categories/Download/downRabbitMQServer.php /var/Konsolidate/Categories/Download/
	cp Categories/Download/DownloadFunctions.php /var/Konsolidate/Categories/Download/

#Files within Log directory
	cp -r Categories/Log/* /var/Konsolidate/Categories/Log/

#Files within Parsing directory
	cp -r Categories/Parsing/* /var/Konsolidate/Categories/Parsing/

#Files within Register directory
	cp Categories/Register/RegistrationFunctions.php /var/Konsolidate/Categories/Register/
	cp Categories/Register/regRabbitMQServer.php /var/Konsolidate/Categories/Register/

#Files within Require directory
	cp -r Categories/Require/* /var/Konsolidate/Categories/Require/

#Files within RSync directory
	cp Categories/RSync/rdownload.sh /var/Konsolidate/Categories/RSync/

#Files within Sessions directory
	cp Categories/Sessions/loginRabbitMQServer.php /var/Konsolidate/Categories/Sessions/
	cp Categories/Sessions/SessionFunctions.php /var/Konsolidate/Categories/Sessions/

#Files within Startup directory
        cp Categories/Startup/backendListeners.sh /var/Konsolidate/Categories/Startup/
        cp Categories/Startup/RunBackendListeners.service /var/Konsolidate/Categories/Startup/
	cp Categories/Startup/failoverListener.sh /var/Konsolidate/Categories/Startup/
	cp Categories/Startup/RunFailoverListener.service /var/Konsolidate/Categories/Startup/
	cp Categories/Startup/packageListener.sh /var/Konsolidate/Categories/Startup/
	cp Categories/Startup/RunPackageListener.service /var/Konsolidate/Categories/Startup/


	cp /var/Konsolidate/Categories/Startup/RunFailoverListener.service /etc/systemd/system/
	cp /var/Konsolidate/Categories/Startup/RunBackendListeners.service /etc/systemd/system/
	cp /var/Konsolidate/Categories/Startup/RunPackageListener.service /etc/systemd/system/



	systemctl daemon-reload
	systemctl enable RunBackendListeners.service
	systemctl stop RunBackendListeners.service
	systemctl start RunBackendListeners.service
	systemctl enable RunFailoverListener.service
	systemctl stop RunFailoverListener.service
	systemctl start RunFailoverListener.service
	systemctl enable RunPackageListener.service
	systemctl stop RunPackageListener.service
	systemctl start RunPackageListener.service

#Files within Upload directory (currently none as of now)
	
#Files within Failover directory
	cp Categories/Failover/* /var/Konsolidate/Categories/Failover

#Files within View directory
	cp Categories/View/viewRabbitMQServer.php /var/Konsolidate/Categories/View/
	cp Categories/View/ViewFunctions.php /var/Konsolidate/Categories/View/
	echo "YOU BACKEND"
}
elif [ "$output" == "$fe" ]; then
{
	mkdir /var/Konsolidate/
	mkdir /var/Konsolidate/Categories/
	mkdir /var/Konsolidate/Extras/
	mkdir /var/Konsolidate/Pending
	mkdir /var/Konsolidate/Pending/toInstall
	mkdir /var/Konsolidate/Trashed

	mkdir /var/Konsolidate/Categories/Deployment
	mkdir /var/Konsolidate/Categories/Log
	mkdir /var/Konsolidate/Categories/Register
	mkdir /var/Konsolidate/Categories/Require
	mkdir /var/Konsolidate/Categories/RSync
	mkdir /var/Konsolidate/Categories/FileTransfer
	mkdir /var/Konsolidate/Categories/Sessions
	mkdir /var/Konsolidate/Categories/Startup
	mkdir /var/Konsolidate/Categories/Failover
	mkdir /var/Konsolidate/Categories/Failover/ChangeFile
	mkdir /var/www/html/uploads
	
	chmod 777 /var/Konsolidate/Pending
	chmod 777 /var/Konsolidate/Pending/toInstall
	chmod 777 /var/Konsolidate/Categories/Failover/ChangeFile
	chmod 777 /var/www/html/uploads

#Files for Extras/Pending/Trashed directory
	cp -r Extras/* /var/Konsolidate/Extras/
#	cp -r newKonsolidate/Pending/* /var/KonsolidateTesting/Pending/
	cp -r Trashed/* /var/Konsolidate/Trashed/

#Files within Deployment directory
        cp Categories/Deployment/depRabbitMQServer.php /var/Konsolidate/Categories/Deployment/
        cp Categories/Deployment/DeploymentFunctions.php /var/Konsolidate/Categories/Deployment/
        cp Categories/Deployment/devPackage.php /var/Konsolidate/Categories/Deployment/
        cp Categories/Deployment/Packager.sh /var/Konsolidate/Categories/Deployment/
        cp Categories/Deployment/pushUpdate.php /var/Konsolidate/Categories/Deployment/
        cp Categories/Deployment/pushUpdate.sh /var/Konsolidate/Categories/Deployment/
        cp Categories/Deployment/installPackage.sh /var/Konsolidate/Categories/Deployment/

#Files within Download directory
	cp Categories/Download/DownloadProcess.php /var/www/html/
	cp -r Categories/Download/downloads /var/www/html/

#Files within Log directory
	cp -r Categories/Log/* /var/Konsolidate/Categories/Log/

#Files within Register directory
	cp Categories/Register/RegistrationFunctions.php /var/Konsolidate/Categories/Register/
	cp Categories/Register/registration.php /var/www/html/
	cp Categories/Register/RegistrationChecker.php /var/www/html/
	cp Categories/Register/pRegistrationChecker.php /var/www/html/
	cp Categories/Register/pregistration.php /var/www/html/
#Files within Require directory
	cp -r Categories/Require/* /var/Konsolidate/Categories/Require/

#Files within RSync directory
	cp Categories/RSync/rsender.sh /var/Konsolidate/Categories/RSync/

#Files within Sessions directory
	cp Categories/Sessions/login.html /var/www/html/
	cp Categories/Sessions/SessionFunctions.php /var/Konsolidate/Categories/Sessions/
	cp Categories/Sessions/loginRequest.php /var/www/html/
	cp Categories/Sessions/logout.php /var/www/html/
	cp Categories/Sessions/index.html /var/www/html/
#Files within Upload directory
	cp Categories/Upload/UploadProcess.php /var/www/html
	cp -r Categories/Upload/uploads /var/www/html/
#Files within View directory
	cp Categories/View/viewReports.php /var/www/html

#Files within HCP directory
	cp Categories/HCP/* /var/www/html

#Files within Patient directory
	cp Categories/Patient/* /var/www/html

#Files within Researcher directory
	cp Categories/Researcher/* /var/www/html

#Files within Styling directory
	cp Categories/Styling/* /var/www/html

#Files within Failover directory
	cp Categories/Failover/* /var/Konsolidate/Categories/Failover

#Files within Startup directory
        cp Categories/Startup/packageListener.sh /var/Konsolidate/Categories/Startup/
        cp Categories/Startup/RunPackageListener.service /var/Konsolidate/Categories/Startup/


        cp /var/Konsolidate/Categories/Startup/RunPackageListener.service /etc/systemd/system/



        systemctl daemon-reload
        systemctl enable RunPackageListener.service
        systemctl stop RunPackageListener.service
        systemctl start RunPackageListener.service


	echo "YOU FRONTEND"
}
else
	bash ./installer.sh
fi
