#!/bin/bash

echo "This script will deploy a package to QA."
echo ""

printf "Please enter the destination of the package [QABE/QAFE/PRBE/PRFE]"
read destination
destination="${destination^^}"

printf "Please enter the package category you want to update: "
read category

php /var/Konsolidate/Categories/Deployment/pushUpdate.php $destination $category
