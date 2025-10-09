<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attributes')->insert([
            //Attribute dùng chung cho nhiều loại (Laptop, CPU, GPU)
            ['name' => 'Brand', 'data_type' => 'string'],
            ['name' => 'Model', 'data_type' => 'string'],
            ['name' => 'Price', 'data_type' => 'integer'],
            ['name' => 'On Top', 'data_type' => 'integer'],
            ['name' => 'Deal Price', 'data_type' => 'integer'],
            ['name' => 'Sale Price', 'data_type' => 'integer'],
            ['name' => 'Sale Start Date', 'data_type' => 'datetime'],
            ['name' => 'Sale End Date', 'data_type' => 'datetime'],
            ['name' => 'Rating', 'data_type' => 'float'],
            ['name' => 'Tồn kho', 'data_type' => 'integer'],
            //Linh kiện
            ['name' => 'Loại linh kiện', 'data_type' => 'string'],
            //Ảnh sản phẩm
            ['name' => 'Thumbnail', 'data_type' => 'string'],
            ['name' => 'Thumbnail Small', 'data_type' => 'string'],
            ['name' => 'Image1', 'data_type' => 'string'],
            ['name' => 'Image2', 'data_type' => 'string'],
            ['name' => 'Image3', 'data_type' => 'string'],
            ['name' => 'Image4', 'data_type' => 'string'],
            ['name' => 'Image5', 'data_type' => 'string'],
            //laptop_attribute
            ['name' => '[Laptop] Loại laptop', 'data_type' => 'string'],
            ['name' => '[Laptop] Vi xử lý', 'data_type' => 'string'],
            ['name' => '[Laptop] Số nhân', 'data_type' => 'integer'],
            ['name' => '[Laptop] Số luồng', 'data_type' => 'integer'],
            ['name' => '[Laptop] Tốc độ tối đa', 'data_type' => 'string'],
            ['name' => '[Laptop] Bộ nhớ đệm', 'data_type' => 'string'],
            ['name' => '[Laptop] Card đồ hoạ', 'data_type' => 'string'],
            ['name' => '[Laptop] Kích thước màn hình', 'data_type' => 'string'],
            ['name' => '[Laptop] Độ phân giải', 'data_type' => 'string'],
            ['name' => '[Laptop] Tần số quét', 'data_type' => 'string'],
            ['name' => '[Laptop] Công nghệ màn hình', 'data_type' => 'string'],
            ['name' => '[Laptop] Dung lượng RAM', 'data_type' => 'string'],
            ['name' => '[Laptop] Loại RAM', 'data_type' => 'string'],
            ['name' => '[Laptop] Bus RAM', 'data_type' => 'string'],
            ['name' => '[Laptop] Số khe cắm RAM', 'data_type' => 'string'],
            ['name' => '[Laptop] Hỗ trợ RAM tối đa', 'data_type' => 'string'],
            ['name' => '[Laptop] Pin', 'data_type' => 'string'],
            ['name' => '[Laptop] Ổ cứng', 'data_type' => 'string'],
            ['name' => '[Laptop] Dung lượng ổ cứng', 'data_type' => 'string'],
            ['name' => '[Laptop] Số khe ổ cứng', 'data_type' => 'string'],
            ['name' => '[Laptop] Cân nặng', 'data_type' => 'string'],
            ['name' => '[Laptop] Màu sắc', 'data_type' => 'string'],
            ['name' => '[Laptop] OS', 'data_type' => 'string'],
            ['name' => '[Laptop] Camera', 'data_type' => 'string'],
            //CPU_attribute
            ['name' => '[CPU] Socket', 'data_type' => 'integer'],
            ['name' => '[CPU] Tốc độ cơ bản', 'data_type' => 'integer'],
            ['name' => '[CPU] Tốc độ tối đa', 'data_type' => 'integer'],
            ['name' => '[CPU] Nhân CPU', 'data_type' => 'integer'],
            ['name' => '[CPU] Luồng CPU', 'data_type' => 'integer'],
            ['name' => '[CPU] Số P-core', 'data_type' => 'string'],
            ['name' => '[CPU] Số E-core', 'data_type' => 'string'],
            ['name' => '[CPU] Bộ nhớ hỗ trợ', 'data_type' => 'string'],
            ['name' => '[CPU] Kích thước bộ nhớ tối đa', 'data_type' => 'string'],
            ['name' => '[CPU] Số kênh bộ nhớ tối đa', 'data_type' => 'string'],
            ['name' => '[CPU] Điện áp tiêu thụ tối đa', 'data_type' => 'string'],
            ['name' => '[CPU] Công suất cơ bản', 'data_type' => 'string'],
            ['name' => '[CPU] Tính năng', 'data_type' => 'string'],
            ['name' => '[CPU] Thuật in thạch bản', 'data_type' => 'string'],

            // GPU_attribute
            ['name' => '[GPU] Bộ nhớ', 'data_type' => 'string'],
            ['name' => '[GPU] Core Clock', 'data_type' => 'string'],
            ['name' => '[GPU] Lõi', 'data_type' => 'string'],
            ['name' => '[GPU] Clock bộ nhớ', 'data_type' => 'string'],
            ['name' => '[GPU] Giao diện bộ nhớ', 'data_type' => 'string'],
            ['name' => '[GPU] Độ phân giải', 'data_type' => 'string'],
            ['name' => '[GPU] Kết nối', 'data_type' => 'string'],
            ['name' => '[GPU] Kích thước', 'data_type' => 'string'],
            ['name' => '[GPU] PSU đề nghị', 'data_type' => 'string'],
            ['name' => '[GPU] Power Connectors', 'data_type' => 'string'],
            ['name' => '[GPU] Hỗ trợ SLI', 'data_type' => 'string'],

            //Ram attribute
            ['name' => '[RAM] Loại RAM', 'data_type' => 'string'],
            ['name' => '[RAM] Dung lượng', 'data_type' => 'string'],
            ['name' => '[RAM] Bus', 'data_type' => 'string'],
            ['name' => '[RAM] Độ trễ', 'data_type' => 'string'],
            ['name' => '[RAM] Điện áp', 'data_type' => 'string'],
            ['name' => '[RAM] Tản nhiệt', 'data_type' => 'string'],
            ['name' => '[RAM] Công nghệ RAM', 'data_type' => 'string'],
            ['name' => '[RAM] Kích thước', 'data_type' => 'string'],

            //monitor attribute
            ['name' => '[MON] Kiểu dáng màn hình', 'data_type' => 'string'],
            ['name' => '[MON] Tỉ lệ khung hình', 'data_type' => 'string'],
            ['name' => '[MON] Kích thước mặc định', 'data_type' => 'string'],
            ['name' => '[MON] Công nghệ tấm nền', 'data_type' => 'string'],
            ['name' => '[MON] Phân giải điểm ảnh', 'data_type' => 'string'],
            ['name' => '[MON] Độ sáng hiển thị', 'data_type' => 'string'],
            ['name' => '[MON] Tần số quét', 'data_type' => 'string'],
            ['name' => '[MON] Thời gian đáp ứng', 'data_type' => 'string'],
            ['name' => '[MON] Chỉ số màu sắc', 'data_type' => 'string'],
            ['name' => '[MON] Hỗ trợ tiêu chuẩn', 'data_type' => 'string'],
            ['name' => '[MON] Cổng cắm kết nối', 'data_type' => 'string'],
            ['name' => '[MON] Phụ kiện trọng hộp', 'data_type' => 'string'],
            ['name' => '[MON] Điện năng tiêu thụ', 'data_type' => 'string'],
            ['name' => '[MON] Tính năng âm thanh', 'data_type' => 'string'],
            ['name' => '[MON] Thiết kế cơ học', 'data_type' => 'string'],
            ['name' => '[MON] Trọng lượng', 'data_type' => 'string'],

            //gaming-gear
            ['name' => '[GG] Loại thiết bị', 'data_type' => 'string'],
            ['name' => '[GG] Kết nối', 'data_type' => 'string'],
            ['name' => '[GG] Hệ thống đèn RGB', 'data_type' => 'string'],
            ['name' => '[GG] Chất liệu', 'data_type' => 'string'],
            ['name' => '[GG] Trọng lượng', 'data_type' => 'string'],
            ['name' => '[GG] Tính năng đặc biệt', 'data_type' => 'string'],
            ['name' => '[GG] Cổng kết nối', 'data_type' => 'string'],
            ['name' => '[GG] Phụ kiện đi kèm', 'data_type' => 'string'],

            //Media
            ['name' => '[Media] Loại thiết bị', 'data_type' => 'string'],
            ['name' => '[Media] Kết nối', 'data_type' => 'string'],
            ['name' => '[Media] Tính năng', 'data_type' => 'string'],
            ['name' => '[Media] Chất liệu', 'data_type' => 'string'],
            ['name' => '[Media] Trọng lượng', 'data_type' => 'string'],
            ['name' => '[Media] Nguồn cung cấp', 'data_type' => 'string'],
            ['name' => '[Media] Cổng kết nối', 'data_type' => 'string'],
            ['name' => '[Media] Phụ kiện đi kèm', 'data_type' => 'string'],

            //Cooling
            ['name' => '[Cooling] Loại làm mát', 'data_type' => 'string'],
            ['name' => '[Cooling] Kích thước quạt', 'data_type' => 'string'],
            ['name' => '[Cooling] Tốc độ quạt', 'data_type' => 'string'],
            ['name' => '[Cooling] Độ ồn', 'data_type' => 'string'],
            ['name' => '[Cooling] TDP hỗ trợ', 'data_type' => 'string'],
            ['name' => '[Cooling] Kích thước', 'data_type' => 'string'],
            ['name' => '[Cooling] Tương thích socket', 'data_type' => 'string'],

            //Accessories
            ['name' => '[Accessory] Loại thiết bị', 'data_type' => 'string'],
            ['name' => '[Accessory] Kết nối', 'data_type' => 'string'],
            ['name' => '[Accessory] Tính năng', 'data_type' => 'string'],
            ['name' => '[Accessory] Chất liệu', 'data_type' => 'string'],
            ['name' => '[Accessory] Tương thích', 'data_type' => 'string'],
            ['name' => '[Accessory] Phụ kiện đi kèm', 'data_type' => 'string'],
        ]);
    }
}
