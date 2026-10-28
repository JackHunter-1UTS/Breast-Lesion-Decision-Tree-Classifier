import pickle
import pandas as pd
import sys


with open('decisionTree.pkl', 'rb') as file:
    dt = pickle.load(file)

with open('formatter.pkl', 'rb') as file:
    frm = pickle.load(file)


prediction = dt.predict(frm.format(sys.argv[1], [sys.argv[2], sys.argv[3], sys.argv[4], sys.argv[5], sys.argv[6], sys.argv[7], sys.argv[8], sys.argv[9], sys.argv[10], sys.argv[11]]))
print(prediction[0])