#!/usr/bin/env python

import csv,json
import sys

#Opens 'testData.csv' for reading and creates a new file 'jsonFile' for writing
csvfile = open('testData.csv', 'r')
jsonfile = open('testData.json', 'w')

#Enter the field names for the data
fieldnames = ("Time","Par1","Par2","Par3","Level","Date")
reader = csv.DictReader( csvfile, fieldnames)
for row in reader:
    json.dump(row,jsonfile)
    jsonfile.write('\n')
