#!/bin/bash

printf "Please enter the name of the package: "
read -r name
printf "Please enter the version number: "
read -r version
printf "Please enter a description of the package: "
read -r description

echo $name , $version, $description

~/IT490/Konsolidate/Bundler/createTar.sh 

echo "Packager.sh if statement ran"

php ~/IT490/Konsolidate/rabbitmqphp_example/devPackage.php $name $version $description

#devPackage($name, $version, $path, $status, $description)

