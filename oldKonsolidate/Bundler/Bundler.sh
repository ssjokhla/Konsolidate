#!/bin/bash
echo ""
echo "This script will package a set of files."
echo ""

echo "Enter the category you want to package?"
read category

tar -czvf /var/Konsolidate/Bundler/Packages/$1_$2.tar.gz /var/Konsolidate/Categories/$category

check="true"
