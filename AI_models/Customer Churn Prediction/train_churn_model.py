import pandas as pd
from sklearn.ensemble import RandomForestClassifier
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score
import joblib

# Tải dữ liệu
data = pd.read_csv('D:\churn_data.csv')
def calculate_churn_probability(row):
    churn_probability = 0
    if row['recency_days'] > 90:
        churn_probability += 0.4 
    if row['frequency'] < 2:
        churn_probability += 0.3  
    if row['monetary'] < 5000000:
        churn_probability += 0.2 
    if row['cart_abandon_rate'] < 2:
        churn_probability += 0.1

    if row['monetary'] == 0 or row['frequency'] == 0 or row['recency_days'] == 0:
        churn_probability = 0.4
    return min(churn_probability, 1.0)  # Trả về giá trị từ 0 đến 1

data['churn_probability'] = data.apply(calculate_churn_probability, axis=1)

# Xử lý dữ liệu
X = data[['recency_days', 'frequency', 'monetary', 'cart_abandon_rate']]
y = data['churn_probability'].apply(lambda x: 1 if x >= 0.5 else 0)

# Huấn luyện mô hình
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)
model = RandomForestClassifier(random_state=42)
model.fit(X_train, y_train)

# Đánh giá mô hình
y_pred = model.predict(X_test)
accuracy = accuracy_score(y_test, y_pred)
print(f'Model Accuracy: {accuracy * 100:.2f}%')

# Lưu mô hình
joblib.dump(model, 'churn_model.pkl')