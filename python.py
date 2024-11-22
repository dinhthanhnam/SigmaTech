from sqlalchemy import create_engine
from sklearn.linear_model import LinearRegression
import numpy as np
import matplotlib.pyplot as plt
import pandas as pd
import seaborn as sns
import os
import sys

# Thiết lập mã hóa đầu ra
sys.stdout.reconfigure(encoding='utf-8')

# === 1. Kết nối cơ sở dữ liệu ===
db_connection_str = 'mysql+pymysql://root:@localhost:3306/sigmatech'
db_connection = create_engine(db_connection_str)

# === 2. Truy vấn dữ liệu từ cơ sở dữ liệu ===
query = """
    SELECT 
        od.product_id,
        l.name AS laptop_name,
        od.created_at AS order_date,
        SUM(od.quantity) AS total_sales
    FROM 
        order_details od
    JOIN 
        laptops l ON l.id = od.product_id
    GROUP BY od.product_id, l.name, od.created_at
"""
data = pd.read_sql(query, con=db_connection)

# Xử lý dữ liệu thời gian
data['order_date'] = pd.to_datetime(data['order_date'])

# === 3. Xử lý dữ liệu ===
# Tính tổng doanh số theo sản phẩm
total_sales_by_product = data.groupby('laptop_name')['total_sales'].sum().sort_values(ascending=False)
top_5_products = total_sales_by_product.head(5).index  # Lấy 5 sản phẩm bán chạy nhất
data_top5 = data[data['laptop_name'].isin(top_5_products)]

# === 4. Tạo thư mục lưu biểu đồ ===
output_dir = os.path.join(os.getcwd(), 'public', 'assets', 'img', 'AI')
os.makedirs(output_dir, exist_ok=True)

# === 5. Hồi quy và dự đoán doanh số ===
plt.figure(figsize=(20, 8))
colors = sns.color_palette("tab10")

for i, product in enumerate(top_5_products):
    product_data = data_top5[data_top5['laptop_name'] == product].copy()
    product_data['order_date_numeric'] = product_data['order_date'].map(pd.Timestamp.toordinal)

    # Kiểm tra đủ dữ liệu để hồi quy
    if len(product_data) < 2:
        print(f"Sản phẩm {product} không đủ dữ liệu để dự đoán.")
        continue

    # Hồi quy tuyến tính
    X = product_data[['order_date_numeric']]
    y = product_data['total_sales']
    model = LinearRegression()
    model.fit(X, y)

    # Dự đoán doanh số cho 30 ngày tiếp theo
    future_dates = [product_data['order_date'].max() + pd.Timedelta(days=i) for i in range(30)]
    future_dates_numeric = np.array([date.toordinal() for date in future_dates]).reshape(-1, 1)
    predicted_sales = model.predict(future_dates_numeric)

    # Vẽ biểu đồ
    plt.bar(
        product_data['order_date'], 
        product_data['total_sales'], 
        label=f"{product} (Thực tế)", 
        color=colors[i], 
        alpha=0.7, 
        width=1.5
    )
    plt.plot(
        future_dates, 
        predicted_sales, 
        label=f"{product} (Dự đoán)", 
        linestyle='--', 
        color=colors[i], 
        linewidth=2
    )

# Tùy chỉnh biểu đồ
plt.xlabel('Ngày', fontsize=12)
plt.ylabel('Doanh số', fontsize=12)
plt.title('Dự đoán doanh số cho 5 sản phẩm bán chạy nhất', fontsize=16)
plt.xticks(rotation=45)
plt.legend(loc='upper left', bbox_to_anchor=(1.05, 1), fontsize=10, frameon=True)
plt.grid(axis='y', linestyle='--', alpha=0.6)
plt.tight_layout()

# Lưu biểu đồ
output_path_top5 = os.path.join(output_dir, 'combined_chart_top_5.png')
plt.savefig(output_path_top5, bbox_inches='tight')
plt.close()
print(f"Biểu đồ dự đoán doanh số top 5 sản phẩm đã được lưu tại: {output_path_top5}")

# === 6. Cập nhật cột 'On Top' trong cơ sở dữ liệu ===
from sqlalchemy.orm import sessionmaker

Session = sessionmaker(bind=db_connection)
session = Session()

try:
    # Đặt tất cả giá trị 'On Top' về 0
    with db_connection.connect() as conn:
        conn.execute("UPDATE laptop_attribute SET `value` = 0 WHERE `attribute_id` = 4")

    # Lấy danh sách `laptop_id` của các sản phẩm top 5
    query_laptop_ids = """
        SELECT id 
        FROM laptops 
        WHERE name IN ({})
    """.format(','.join(['%s'] * len(top_5_products)))
    
    with db_connection.connect() as conn:
        result = conn.execute(query_laptop_ids, list(top_5_products)).fetchall()
        top_5_laptop_ids = [row[0] for row in result]

    # Cập nhật `On Top` = 1 cho các sản phẩm top 5
    for laptop_id in top_5_laptop_ids:
        update_query = """
            UPDATE laptop_attribute
            SET `value` = 1
            WHERE `laptop_id` = %s AND `attribute_id` = 4
        """
        with db_connection.connect() as conn:
            conn.execute(update_query, (laptop_id,))
    
    print("Cập nhật thành công cột 'On Top' cho 5 sản phẩm bán chạy nhất.")
except Exception as e:
    print(f"Lỗi khi cập nhật cột 'On Top': {e}")

# Đóng session
session.close()
# === 7. Dự đoán tổng doanh thu theo tuần ===
# Tính tổng doanh thu hàng tuần
weekly_sales = data.groupby(pd.Grouper(key='order_date', freq='W'))['total_sales'].sum().reset_index()
weekly_sales['order_date_numeric'] = weekly_sales['order_date'].map(pd.Timestamp.toordinal)

# Kiểm tra dữ liệu đủ để dự đoán
if len(weekly_sales) >= 2:
    # Hồi quy tuyến tính cho doanh thu theo tuần
    X_weekly = weekly_sales[['order_date_numeric']]
    y_weekly = weekly_sales['total_sales']
    model_weekly = LinearRegression()
    model_weekly.fit(X_weekly, y_weekly)

    # Dự đoán doanh thu cho 12 tuần tiếp theo
    last_week_date = weekly_sales['order_date'].max()
    future_week_dates = [last_week_date + pd.DateOffset(weeks=i) for i in range(1, 13)]
    future_week_dates_numeric = np.array([date.toordinal() for date in future_week_dates]).reshape(-1, 1)
    predicted_weekly_sales = model_weekly.predict(future_week_dates_numeric)

    # Vẽ biểu đồ
    plt.figure(figsize=(12, 6))
    plt.bar(
        weekly_sales['order_date'], 
        weekly_sales['total_sales'], 
        label="Doanh thu thực tế", 
        color='skyblue', 
        alpha=0.7, 
        width=5
    )
    plt.plot(
        future_week_dates, 
        predicted_weekly_sales, 
        label="Dự đoán doanh thu", 
        linestyle='--', 
        color='orange', 
        linewidth=2
    )

    # Tùy chỉnh biểu đồ
    plt.xlabel('Tuần', fontsize=12)
    plt.ylabel('Tổng doanh thu', fontsize=12)
    plt.title('Dự đoán tổng doanh thu theo tuần', fontsize=16)
    plt.xticks(rotation=45)
    plt.legend(loc='upper left', fontsize=10)
    plt.grid(axis='y', linestyle='--', alpha=0.6)
    plt.tight_layout()

    # Lưu biểu đồ
    output_path_weekly = os.path.join(output_dir, 'weekly_sales_prediction.png')
    plt.savefig(output_path_weekly, bbox_inches='tight')
    plt.close()

    print(f"Biểu đồ dự đoán tổng doanh thu theo tuần đã được lưu tại: {output_path_weekly}")
else:
    print("Không đủ dữ liệu để dự đoán tổng doanh thu theo tuần.")


