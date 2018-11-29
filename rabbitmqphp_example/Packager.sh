#!/bin/bash

printf "Please enter the category you want to package: "
read -r category
printf "Please enter the version number: "
read -r version
printf "Please enter a description of the package: "
read -r description

echo $category , $version, $description

tar -czvf /var/Konsolidate/Pending/$category\_$version.tar.gz /var/Konsolidate/Categories/$category

echo "Packager.sh if statement ran"

php ~/IT490/Konsolidate/rabbitmqphp_example/devPackage.php $category $version $description

#devPackage($name, $version, $path, $status, $description)
