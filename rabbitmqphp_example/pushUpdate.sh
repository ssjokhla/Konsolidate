#!/bin/bash

echo "This script will deploy a package to QA."
echo ""

printf "Please enter the destination of the package [QABE/QAFE/PRBE/PRFE]"
read destination

printf "Please enter the package category you want to update: "
read category

printf "Please enter the version you want to update: "
read version

php ~/IT490/Konsolidate/rabbitmqphp_example/pushUpdate.php $destination $category $version
