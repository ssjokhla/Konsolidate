#!/usr/bin/env python

import csv,json
import sys

def convertToJson(str):
    print json.dumps(list(csv.reader(open(str))))



convertToJson(sys.argv[1:])
