#!/bin/bash

printf "Please enter the category you want to package: "
read -r category

echo $category , $version #$description

tar -czvf /var/Konsolidate/Pending/$category.tar.gz /var/Konsolidate/Categories/$category

echo "Packager.sh if statement ran"

php ~/IT490/Konsolidate/rabbitmqphp_example/devPackage.php $category

#devPackage($name, $version, $path, $status, $description)
