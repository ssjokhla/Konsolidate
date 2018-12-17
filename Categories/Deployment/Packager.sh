#!/bin/bash

printf "Please enter the category you want to package: "
read -r category

tar -czvf /var/Konsolidate/Pending/$category.tar.gz -P /var/Konsolidate/Categories/$category

echo "Packager.sh if statement ran"

php /var/Konsolidate/Categories/Deployment/devPackage.php $category

#devPackage($name, $version, $path, $status, $description)
