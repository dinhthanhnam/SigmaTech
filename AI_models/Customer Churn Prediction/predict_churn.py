import sys
import json
import joblib
import numpy as np

model = joblib.load('churn_model.pkl')
features = json.loads(sys.argv[1])
data = np.array([[
    features['recency_days'],
    features['frequency'],
    features['monetary'],
    features['cart_abandon_rate']
]])
probability = model.predict_proba(data)[0][1]
print(json.dumps({'probability': probability}))
