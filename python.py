from sqlalchemy import create_engine
from sklearn.linear_model import LinearRegression
import numpy as np
import matplotlib.pyplot as plt
import pandas as pd
import os
import sys
sys.stdout.reconfigure(encoding='utf-8')

# Kết nối đến cơ sở dữ liệu
db_connection_str = 'mysql+pymysql://root:@localhost:3306/sigmatech'
db_connection = create_engine(db_connection_str)

# Truy vấn dữ liệu từ bảng order_details
query = """
    SELECT 
    od.*,
    od.created_at AS order_date,
     SUM(od.quantity) AS total_sales,
    l.name AS laptop_name
    FROM 
        order_details od
    JOIN 
        laptops l ON l.id = od.product_id 
    JOIN 
        categories c ON l.category_id = c.id
    GROUP BY order_date, laptop_name
"""
data = pd.read_sql(query, con=db_connection)

# Chuyển đổi cột `order_date` thành định dạng ngày
data['order_date'] = pd.to_datetime(data['order_date'])

# Nhóm dữ liệu theo từng sản phẩm
products = data['laptop_name'].unique()  # Lấy danh sách sản phẩm
predicted_results = {}

# Đường dẫn lưu ảnh (Laravel public folder)
output_dir = os.path.join(os.getcwd(), 'public', 'assets', 'img', 'AI')  # Đường dẫn tương đối
os.makedirs(output_dir, exist_ok=True)  # Tạo thư mục nếu chưa tồn tại
output_path = os.path.join(output_dir, 'predicted_sales_all_in_one.png')

# Tạo biểu đồ
plt.figure(figsize=(12, 8))

# Vòng lặp dự đoán và vẽ các đường trên cùng một biểu đồ
for product in products:
    # Lọc dữ liệu của từng sản phẩm
    product_data = data[data['laptop_name'] == product]
    
    # Chuyển đổi ngày thành số để huấn luyện mô hình
    product_data = product_data.copy()
    product_data['order_date_numeric'] = product_data['order_date'].map(pd.Timestamp.toordinal)

    # Nếu dữ liệu không đủ để dự đoán thì bỏ qua
    if len(product_data) < 2:
        continue
    
    # Chuẩn bị dữ liệu để huấn luyện
    X = product_data[['order_date_numeric']]
    y = product_data['total_sales']
    
    # Huấn luyện mô hình Linear Regression
    model = LinearRegression()
    model.fit(X, y)
    
    # Dự đoán doanh số cho 30 ngày tới
    future_dates = [product_data['order_date'].max() + pd.Timedelta(days=i) for i in range(30)]
    future_dates_numeric = np.array([date.toordinal() for date in future_dates]).reshape(-1, 1)
    predicted_sales = model.predict(future_dates_numeric)
    
    # Lưu kết quả dự đoán
    predicted_results[product] = predicted_sales.sum()
    
    # Vẽ đường dữ liệu thực tế và dự đoán
    plt.plot(product_data['order_date'], product_data['total_sales'], label=f'{product} (thực tế)', marker='o')
    plt.plot(future_dates, predicted_sales, label=f'{product} (dự đoán)', linestyle='--')

# Thiết lập biểu đồ
plt.xlabel('Ngày')
plt.ylabel('Doanh số')
plt.title('Dự đoán doanh số cho tất cả sản phẩm')
plt.legend()
plt.grid(True)
plt.xticks(rotation=45)
plt.tight_layout()

# Lưu hình
plt.savefig(output_path)
plt.close()
print(f"Biểu đồ đã được lưu tại: {output_path}")

# In kết quả dự đoán
predicted_results = sorted(predicted_results.items(), key=lambda x: x[1], reverse=True)
print("\nSản phẩm dự đoán bán chạy nhất:")
for product, sales in predicted_results:
    print(f"{product}: {sales:.2f} sản phẩm (dự đoán cho 30 ngày tới)")
