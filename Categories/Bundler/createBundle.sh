#!/bin/bash

printf "Please enter the name of the package: "
read -r name
printf "Please enter the version number: "
read -r version
printf "Please enter a description of the package: "
read -r description

echo $name , $version, $description

/var/Konsolidate/Categories/Bundler/createTar.sh 

echo "Packager.sh if statement ran"

php /var/Konsolidate/Categories/Bundler/devPackage.php $name $version $description

#devPackage($name, $version, $path, $status, $description)
