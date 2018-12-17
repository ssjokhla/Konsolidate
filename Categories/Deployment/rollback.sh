#!/bin/bash

echo "This script will Rollback and update."
echo ""

printf "Please enter the destination of the package [QABE/QAFE/PRBE/PRFE]: "
read destination
destination="${destination^^}"

printf "Please enter the package category you want to update: "
read category

php /var/Konsolidate/Categories/Deployment/rollback.php $destination $category
