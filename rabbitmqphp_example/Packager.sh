#!/bin/bash

printf "Please enter the name of the package: "
read -r name
printf "Please enter the version number: "
read -r version
printf "Please enter a description of the package: "
read -r description

echo $name , $version, $description

php ~/Konsolidate/rabbitmqphp_example/devPackage.php $name $version $description

~/Konsolidate/Bundler/Bundler

#devPackage($name, $version, $path, $status, $description)

