import os
import pandas as pd
import matplotlib.pyplot as plt
from sqlalchemy import create_engine

# Kết nối đến cơ sở dữ liệu MySQL
engine = create_engine('mysql+pymysql://root:@localhost:3306/sigmatech')

# Truy vấn dữ liệu
query = """
SELECT 
    od.product_id,
    o.customer_name,
    l.name AS laptop_name,
    od.created_at AS order_date,
    o.status,
    SUM(od.quantity) AS total_sales,
    SUM(od.quantity * la.value) AS total_price
FROM 
    order_details od
JOIN 
    laptops l ON l.id = od.product_id
JOIN
    orders o ON o.id = od.order_id
JOIN
    laptop_attribute la ON la.laptop_id = l.id AND la.attribute_id = 5
WHERE 
    la.attribute_id = 5
GROUP BY 
    od.product_id, l.name, od.created_at, o.customer_name;
"""

# Đọc dữ liệu vào DataFrame
data = pd.read_sql(query, engine)

# Chuyển đổi cột order_date thành định dạng datetime
data['order_date'] = pd.to_datetime(data['order_date'])

# Đường dẫn đến thư mục public/img/AI trong dự án Laravel
laravel_path = 'C:/Code/SigmaTech/public/assets/img/AI/'
os.makedirs(laravel_path, exist_ok=True)

# Thay đổi đường dẫn lưu file
output_dir = laravel_path

# Biểu đồ 1: Doanh thu theo tuần
data['week'] = data['order_date'].dt.to_period('W').apply(lambda r: r.start_time)
weekly_revenue = data.groupby('week')['total_price'].sum()
plt.figure(figsize=(10, 6))
weekly_revenue.plot(kind='bar', color='skyblue', edgecolor='black')
plt.title('Doanh thu theo tuần')
plt.xlabel('Tuần')
plt.ylabel('Doanh thu (VNĐ)')
plt.xticks(rotation=45)
plt.tight_layout()
plt.savefig(os.path.join(output_dir, 'doanh_thu_theo_tuan.png'))
plt.close()

# Biểu đồ 2: Sản phẩm bán chạy nhất
best_selling_products = data.groupby('laptop_name')['total_sales'].sum().nlargest(10)
plt.figure(figsize=(10, 6))
best_selling_products.plot(kind='bar', color='orange', edgecolor='black')
plt.title('Top 10 sản phẩm bán chạy nhất')
plt.xlabel('Sản phẩm')
plt.ylabel('Số lượng bán')
plt.xticks(rotation=45)
plt.tight_layout()
plt.savefig(os.path.join(output_dir, 'san_pham_ban_chay_nhat.png'))
plt.close()

# Biểu đồ 3: Tỷ lệ trạng thái đơn hàng
order_status_counts = data['status'].value_counts()
plt.figure(figsize=(8, 8))
order_status_counts.plot(kind='pie', autopct='%1.1f%%', startangle=90, colors=['#66c2a5', '#fc8d62', '#8da0cb'])
plt.title('Tỷ lệ trạng thái đơn hàng')
plt.ylabel('')
plt.tight_layout()
plt.savefig(os.path.join(output_dir, 'ty_le_trang_thai_don_hang.png'))
plt.close()

# Biểu đồ 4: Khách hàng quay lại mua hàng
customer_order_counts = data.groupby('customer_name').size()
repeat_customers = (customer_order_counts > 1).sum()
one_time_customers = (customer_order_counts == 1).sum()
customer_data = pd.Series({'Khách hàng quay lại': repeat_customers, 'Khách mua 1 lần': one_time_customers})
plt.figure(figsize=(8, 8))
customer_data.plot(kind='pie', autopct='%1.1f%%', startangle=90, colors=['#a6d854', '#ffd92f'])
plt.title('Tỷ lệ khách hàng quay lại vs mua 1 lần')
plt.ylabel('')
plt.tight_layout()
plt.savefig(os.path.join(output_dir, 'ty_le_khach_hang.png'))
plt.close()

print(f"Biểu đồ đã được lưu trong thư mục '{output_dir}'")
