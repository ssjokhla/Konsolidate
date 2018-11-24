#!/bin/bash


#This is a simple solution to convert a csv to json.
#Not very good because it requires manual entry of the file name into the code
#and it does not include field names

python -c "import csv,json;print json.dumps(list(csv.reader(open('testData.csv'))))" >> testJson.json
 
