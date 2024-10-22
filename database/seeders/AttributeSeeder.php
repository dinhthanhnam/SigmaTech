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
            //laptop_attribute
            
            ['name' => '[Laptop] Loại laptop', 'data_type' => 'string'],
            ['name' => '[Laptop] Vi xử lý', 'data_type' => 'string'],
            ['name' => '[Laptop] Card đồ hoạ', 'data_type' => 'string'],
            ['name' => '[Laptop] Màn hình', 'data_type' => 'string'],
            ['name' => '[Laptop] Dung lượng RAM', 'data_type' => 'string'],
            ['name' => '[Laptop] Dung lượng Pin', 'data_type' => 'string'],
            ['name' => '[Laptop] Ổ cứng', 'data_type' => 'string'],
            ['name' => '[Laptop] Câng nặng', 'data_type' => 'string'],
            ['name' => '[Laptop] Tính năng', 'data_type' => 'string'],
            ['name' => '[Laptop] Màu sắc', 'data_type' => 'string'],
            ['name' => '[Laptop] OS', 'data_type' => 'string'],

            //CPU_attribute
            ['name' => '[CPU] Socket', 'data_type' => 'integer'],
            ['name' => '[CPU] Tốc độ cơ bản', 'data_type' => 'integer'],
            ['name' => '[CPU] Tốc độ tối đa', 'data_type' => 'integer'],
            ['name' => '[CPU] Nhân CPU', 'data_type' => 'integer'],
            ['name' => '[CPU] Luồng CPU', 'data_type' => 'integer'],
            ['name' => '[CPU] Số P-core', 'data_type' => 'string'],
            ['name' => '[CPU] Số E-core', 'data_type' => 'string'],
            ['name' => '[CPU] Bộ nhớ hỗ trợ', 'data_type' => 'string'],
            ['name' => '[CPU] Số kênh bộ nhớ tối đa', 'data_type' => 'string'],
            ['name' => '[CPU] Điện áp tiêu thụ tối đa', 'data_type' => 'string'],
            ['name' => '[CPU] Tính năng', 'data_type' => 'string'],
            
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
        ]);
    }
}
