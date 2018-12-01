#!/bin/bash
echo ""
echo "This script will package a set of files."
echo ""

echo "Make sure to copy the files over to Bundle/files/ directory.  Use the command 'cp --parents /path/to/file files/'"

echo "If not done, please exit out of this program with [ctrl + c]"

echo "What do you want to call the package?"

read payload

tar -czvf /usr/lib/packages/$payload.tar.gz /var/Konsolidate/Categories/Bundler/files/

check="true"
