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
	mkdir /var/Konsolidate/Trashed

	mkdir /var/Konsolidate/Categories/Bundler
	mkdir /var/Konsolidate/Categories/Database
	mkdir /var/Konsolidate/Categories/Deployment
	mkdir /var/Konsolidate/Categories/Download
	mkdir /var/Konsolidate/Categories/Log
	mkdir /var/Konsolidate/Categories/Parsing
	mkdir /var/Konsolidate/Categories/Register
	mkdir /var/Konsolidate/Categories/Require
	mkdir /var/Konsolidate/Categories/RSync
	mkdir /var/Konsolidate/Categories/Sessions
	mkdir /var/Konsolidate/Categories/Upload
	mkdir /var/Konsolidate/Categories/View

#Files for Extras/Pending/Trashed directory
	cp -r /Extras/* /var/Konsolidate/Extras/
#	cp -r newKonsolidate/Pending/* /var/KonsolidateTesting/Pending/
	cp -r /Trashed/* /var/Konsolidate/Trashed/



#Files within Bundler directory
	cp /Categories/Bundler/createBundle.sh /var/Konsolidate/Categories/Bundler/
	cp /Categories/Bundler/createTar.sh /var/Konsolidate/Categories/Bundler/
	cp /Categories/Bundler/devPackage.php /var/Konsolidate/Categories/Bundler/
	cp -r /Categories/Bundler/files /var/Konsolidate/Categories/Bundler/
	cp /Categories/Bundler/PackageFunctions.php /var/Konsolidate/Categories/Bundler/
	cp -r /Categories/Bundler/Packages /var/Konsolidate/Categories/Bundler/

#Files within Database directory
	cp /Categories/Database/addTonsOfColumns.php /var/Konsolidate/Categories/Database/
	cp /Categories/Database/Database.sql /var/Konsolidate/Categories/Database/

#Files within Deployment directory
