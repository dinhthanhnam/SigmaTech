from sqlalchemy import create_engine
from sklearn.linear_model import LinearRegression
import numpy as np
import matplotlib.pyplot as plt
import pandas as pd
import seaborn as sns
import os
import sys
from statsmodels.tsa.holtwinters import ExponentialSmoothing

# Thiết lập mã hóa đầu ra
sys.stdout.reconfigure(encoding='utf-8')

# === 1. Kết nối cơ sở dữ liệu ===
db_connection_str = 'mysql+pymysql://root:@localhost:3306/sigmatech'
db_connection = create_engine(db_connection_str)

# === 2. Truy vấn dữ liệu từ cơ sở dữ liệu ===
query = """
    SELECT 
        od.product_id,
        o.customer_name,
        l.name AS laptop_name,
        od.created_at AS order_date,
        SUM(od.quantity) AS total_sales
    FROM 
        order_details od
    JOIN 
        laptops l ON l.id = od.product_id
    JOIN
    	orders o ON o.id = od.order_id
    GROUP BY od.product_id, l.name, od.created_at, o.customer_name
"""
data = pd.read_sql(query, con=db_connection)

# Chuyển đổi cột ngày tháng
data['order_date'] = pd.to_datetime(data['order_date'])

# Tổng quan dữ liệu
print(data.head())

# --------------------------------------------
# **1. Phân tích sản phẩm bán chạy nhất**
# --------------------------------------------
top_products = data.groupby(['product_id', 'laptop_name'])['total_sales'].sum().reset_index()
top_products = top_products.sort_values(by='total_sales', ascending=False)

# Hiển thị và trực quan hóa
print("Top 10 sản phẩm bán chạy nhất:")
print(top_products.head(10))

plt.figure(figsize=(12, 6))
sns.barplot(
    x=top_products['total_sales'].head(10),
    y=top_products['laptop_name'].head(10),
    palette='viridis'
)
plt.title("Top 10 sản phẩm bán chạy nhất")
plt.xlabel("Tổng số lượng bán")
plt.ylabel("Tên sản phẩm")
plt.show()

# --------------------------------------------
# **2. Dự đoán xu hướng sản phẩm**
# --------------------------------------------
# Lấy dữ liệu của sản phẩm bán chạy nhất





# # --------------------------------------------
# # **3. Dự đoán doanh thu**
# # --------------------------------------------
# # Giả sử bảng có cột 'price'
# data['revenue'] = data['total_sales'] * 1000  # Ví dụ mỗi sản phẩm giá 1000

# # Tổng hợp doanh thu theo ngày
# revenue_data = data.groupby('order_date')['revenue'].sum().reset_index()

# # Dự đoán doanh thu
# revenue_data.set_index('order_date', inplace=True)
# revenue_model = ExponentialSmoothing(
#     revenue_data['revenue'], 
#     seasonal='add', 
#     seasonal_periods=30
# )
# revenue_hw_model = revenue_model.fit()

# revenue_forecast = revenue_hw_model.forecast(steps=30)

# # Vẽ biểu đồ doanh thu
# plt.figure(figsize=(12, 6))
# plt.plot(revenue_data.index, revenue_data['revenue'], label='Doanh thu thực tế')
# plt.plot(revenue_forecast.index, revenue_forecast, linestyle='--', color='red', label='Dự đoán doanh thu')
# plt.title("Dự đoán doanh thu 30 ngày tiếp theo")
# plt.xlabel("Thời gian")
# plt.ylabel("Doanh thu")
# plt.legend()
# plt.show()

# # --------------------------------------------
# # **4. Phân tích và dự đoán tỷ lệ khách hàng quay lại**
# # --------------------------------------------
# # Tính toán RFM (Recency, Frequency, Monetary)
# rfm_data = data.groupby('customer_name').agg({
#     'order_date': lambda x: (data['order_date'].max() - x.max()).days,  # Recency
#     'order_date': 'count',  # Frequency
#     'revenue': 'sum'        # Monetary
# }).reset_index()

# rfm_data.columns = ['customer_name', 'recency', 'frequency', 'monetary']

# # Gắn nhãn: Quay lại hoặc không quay lại
# rfm_data['returning_customer'] = rfm_data['recency'].apply(lambda x: 1 if x < 30 else 0)

# # Huấn luyện mô hình Logistic Regression
# X = rfm_data[['recency', 'frequency', 'monetary']]
# y = rfm_data['returning_customer']

# X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3, random_state=42)

# logistic_model = LogisticRegression()
# logistic_model.fit(X_train, y_train)

# # Đánh giá mô hình
# y_pred = logistic_model.predict(X_test)
# print(classification_report(y_test, y_pred))

# # Hiển thị dữ liệu dự đoán
# rfm_data['predicted_returning'] = logistic_model.predict(X)
# print(rfm_data.head())
