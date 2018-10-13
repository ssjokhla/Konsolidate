#!/usr/bin/env python

import csv,json
import sys

csvfile = open('Car_SampleData.csv', 'r')
jsonfile = open('data.json', 'w')

fieldnames = ("1","2","3","4","5","6")
reader = csv.DictReader( csvfile, fieldnames)
out = json.dumps( [row for row in reader])
jsonfile.write(out)
