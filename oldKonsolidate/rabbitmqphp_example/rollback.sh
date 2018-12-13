#!/bin/bash

echo "This script will rollback a package to the previous working version."
echo ""

printf "Please enter the package category you want to rollback: "
read category

printf "Please enter the destination of the package [QABE/QAFE/PRBE/PRFE]: "
read destination

php ~/IT490/Konsolidate/rabbitmqphp_example/rollback.php $category $destination
