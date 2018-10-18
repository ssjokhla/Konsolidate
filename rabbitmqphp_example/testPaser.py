#!/usr/bin/env python

import csv,MySQLdb

mydb = MySQLdb.connect(host='localhost',
        user='admin',
        password='password',
        db='testDataDB')
cursor = mydb.cursor()

csv_data = csv.reader(file('testdata.csv'))

for row in csv_data:
    cursor.execute('INSERT INTO testData(Time, \Num1, Num2, Num3, Level, Date)' \ ' VALUES ("%s", "%s", "%s")' row)

mdb.commit()
cursor.close()
print "Done"
