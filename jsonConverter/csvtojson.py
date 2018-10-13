#!/usr/bin/env python

import csv,json
import sys

csvfile = open('testData.csv', 'r')
jsonfile = open('testData.json', 'w')

fieldnames = ("Time","Par1","Par2","Par3","Level","Date")
reader = csv.DictReader( csvfile, fieldnames)
for row in reader:
    json.dump(row,jsonfile)
    jsonfile.write('\n')
