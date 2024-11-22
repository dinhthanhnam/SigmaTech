from sqlalchemy import create_engine
from sqlalchemy.orm import sessionmaker
from sklearn.linear_model import LinearRegression
import numpy as np
import matplotlib.pyplot as plt
import pandas as pd
import seaborn as sns
import os
import sys

# Thiết lập mã hóa đầu ra
sys.stdout.reconfigure(encoding='utf-8')

# Kết nối đến cơ sở dữ liệu
db_connection_str = 'mysql+pymysql://root:@localhost:3306/sigmatech'
db_connection = create_engine(db_connection_str)

# Truy vấn dữ liệu từ bảng order_details
query = """
    SELECT 
        od.product_id,
        od.created_at AS order_date,
        SUM(od.quantity) AS total_sales,
        l.name AS laptop_name
    FROM 
        order_details od
    JOIN 
        laptops l ON l.id = od.product_id
    GROUP BY od.product_id, od.created_at, l.name
"""
data = pd.read_sql(query, con=db_connection)

# Xử lý dữ liệu
data['order_date'] = pd.to_datetime(data['order_date'])

# Tổng hợp doanh số theo sản phẩm
total_sales_by_product = data.groupby('laptop_name')['total_sales'].sum().sort_values(ascending=False)
top_5_products = total_sales_by_product.head(5).index
data_top5 = data[data['laptop_name'].isin(top_5_products)]

# Tạo thư mục lưu hình ảnh
output_dir = os.path.join(os.getcwd(), 'public', 'assets', 'img', 'AI')
os.makedirs(output_dir, exist_ok=True)

# === Biểu đồ: Dự đoán doanh thu cho 5 sản phẩm bán chạy nhất ===
output_path_top5 = os.path.join(output_dir, 'combined_chart_top_5.png')
plt.figure(figsize=(20, 8))
colors = sns.color_palette("tab10")

for i, product in enumerate(top_5_products):
    product_data = data_top5[data_top5['laptop_name'] == product].copy()
    product_data['order_date_numeric'] = product_data['order_date'].map(pd.Timestamp.toordinal)

    if len(product_data) < 2:
        continue

    # Hồi quy tuyến tính
    X = product_data[['order_date_numeric']]
    y = product_data['total_sales']
    model = LinearRegression()
    model.fit(X, y)

    # Tính toán dự đoán
    future_dates = [product_data['order_date'].max() + pd.Timedelta(days=i) for i in range(30)]
    future_dates_numeric = np.array([date.toordinal() for date in future_dates]).reshape(-1, 1)
    predicted_sales = model.predict(future_dates_numeric)

    # Biểu đồ cột cho doanh số thực tế
    plt.bar(
        product_data['order_date'],
        product_data['total_sales'],
        label=f"{product} (Thực tế)",
        alpha=0.7,
        color=colors[i],
        width=1.5
    )

    # Biểu đồ đường cho dự đoán
    plt.plot(
        future_dates,
        predicted_sales,
        label=f"{product} (Dự đoán)",
        linestyle='--',
        color=colors[i],
        linewidth=2
    )

# Tùy chỉnh giao diện
plt.xlabel('Ngày', fontsize=12)
plt.ylabel('Doanh số', fontsize=12)
plt.title('Dự đoán doanh số cho 5 sản phẩm bán chạy nhất', fontsize=16)
plt.xticks(rotation=45)
plt.legend(loc='upper left', bbox_to_anchor=(1.05, 1), fontsize=10, frameon=True)
plt.grid(axis='y', linestyle='--', alpha=0.6)
plt.tight_layout()

# Lưu biểu đồ
plt.savefig(output_path_top5, bbox_inches='tight')
plt.close()

print(f"Biểu đồ dự đoán doanh số top 5 sản phẩm đã được lưu tại: {output_path_top5}")

# === Cập nhật cột 'On Top' trong cơ sở dữ liệu ===
Session = sessionmaker(bind=db_connection)
session = Session()

try:
    # Đặt tất cả giá trị 'On Top' về 0 trước khi cập nhật
    with db_connection.connect() as conn:
        conn.execute("UPDATE laptop_attribute SET `value` = 0 WHERE `attribute_id` = 4")

    # Lấy danh sách `laptop_id` dựa trên `laptop_name` trong top 5
    top_5_products_list = list(top_5_products)

    # Truy vấn để lấy `laptop_id` của các sản phẩm
    query_laptop_ids = f"""
        SELECT id 
        FROM laptops 
        WHERE name IN ({','.join(['%s'] * len(top_5_products_list))})
    """
    with db_connection.connect() as conn:
        result = conn.execute(query_laptop_ids, top_5_products_list).fetchall()
        top_5_laptop_ids = [row[0] for row in result]

    # Cập nhật giá trị 'On Top' = 1 cho các sản phẩm trong top 5
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
    print(f"Lỗi trong quá trình cập nhật cột 'On Top': {e}")

# Đóng session
session.close()
