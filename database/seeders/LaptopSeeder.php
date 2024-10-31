<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Laptop;
use App\Models\Attribute;
use App\Models\LaptopAttribute;

class LaptopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laptops = [
            [
                'name' => 'Laptop Asus ROG Strix G16 G614JI',
                'category_id' => 1,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'Asus'],
                    ['name' => 'Model', 'value' => 'NBAS1394'],
                    ['name' => 'Price', 'value' => '54990000'],
                    ['name' => 'Deal Price', 'value' => '42990000'],
                    ['name' => 'Rating', 'value' => '5'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/laptops/gaming/1/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/laptops/gaming/1/Image1.jpg'],
                    ['name' => 'Image2', 'value' => '/assets/img/products/laptops/gaming/1/Image2.jpg'],
                    ['name' => 'Image3', 'value' => '/assets/img/products/laptops/gaming/1/Image3.jpg'],
                    ['name' => 'Image4', 'value' => '/assets/img/products/laptops/gaming/1/Image4.jpg'],
                    ['name' => 'Image5', 'value' => '/assets/img/products/laptops/gaming/1/Image5.jpg'],
                    ['name' => '[Laptop] Loại laptop', 'value' => 'Gaming'],
                    ['name' => '[Laptop] Vi xử lý', 'value' => 'Intel Core i7-13650HX'],
                    ['name' => '[Laptop] Số nhân', 'value' => '14'],
                    ['name' => '[Laptop] Số luồng', 'value' => '20'],
                    ['name' => '[Laptop] Tốc độ tối đa', 'value' => 'upto 4.90 GHz'],
                    ['name' => '[Laptop] Bộ nhớ đệm', 'value' => '24MB'],
                    ['name' => '[Laptop] Card đồ hoạ', 'value' => 'NVIDIA GeForce RTX 4060 8GB GDDR6'],
                    ['name' => '[Laptop] Kích thước màn hình', 'value' => '16 inch 16:10'],
                    ['name' => '[Laptop] Độ phân giải', 'value' => 'QHD+ (2560 x 1600, WQXGA)'],
                    ['name' => '[Laptop] Tần số quét', 'value' => '240Hz'],
                    ['name' => '[Laptop] Công nghệ màn hình', 'value' => '3ms IPS-level, 500 nits, 100% DCI-P3, anti-glare display'],
                    ['name' => '[Laptop] Dung lượng RAM', 'value' => '16GB'],
                    ['name' => '[Laptop] Loại RAM', 'value' => 'DDR5'],
                    ['name' => '[Laptop] Bus RAM', 'value' => '4800Mhz'],
                    ['name' => '[Laptop] Số khe cắm RAM', 'value' => '2'],
                    ['name' => '[Laptop] Hỗ trợ RAM tối đa', 'value' => '32GB'],
                    ['name' => '[Laptop] Pin', 'value' => '4-cell, 90WHrs'],
                    ['name' => '[Laptop] Ổ cứng', 'value' => '512GB PCIe® 4.0 NVMe™ M.2 SSD'],
                    ['name' => '[Laptop] Dung lượng ổ cứng', 'value' => '512GB'],
                    ['name' => '[Laptop] Số khe ổ cứng', 'value' => '2'],
                    ['name' => '[Laptop] Cân nặng', 'value' => '2.50 Kg'],
                    ['name' => '[Laptop] Màu sắc', 'value' => 'Eclipse Gray'],
                    ['name' => '[Laptop] Camera', 'value' => '720P HD camera'],
                    ['name' => '[Laptop] OS', 'value' => 'Windows 11 Home']
                ]
            ],
            [
                'name' => 'Laptop Asus ROG Strix G16 G614JV',
                'category_id' => 1,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'Asus'],
                    ['name' => 'Model', 'value' => 'NBAS1394'],
                    ['name' => 'Price', 'value' => '54990000'],
                    ['name' => 'Deal Price', 'value' => '42990000'],
                    ['name' => 'Rating', 'value' => '5'],
                    ['name' => '[Laptop] Loại laptop', 'value' => 'Gaming'],
                    ['name' => '[Laptop] Vi xử lý', 'value' => 'Intel Core i7-13650HX'],
                    ['name' => '[Laptop] Số nhân', 'value' => '14'],
                    ['name' => '[Laptop] Số luồng', 'value' => '20'],
                    ['name' => '[Laptop] Tốc độ tối đa', 'value' => 'upto 4.90 GHz'],
                    ['name' => '[Laptop] Bộ nhớ đệm', 'value' => '24MB'],
                    ['name' => '[Laptop] Card đồ hoạ', 'value' => 'NVIDIA GeForce RTX 4060 8GB GDDR6'],
                    ['name' => '[Laptop] Kích thước màn hình', 'value' => '16 inch 16:10'],
                    ['name' => '[Laptop] Độ phân giải', 'value' => 'QHD+ (2560 x 1600, WQXGA)'],
                    ['name' => '[Laptop] Tần số quét', 'value' => '240Hz'],
                    ['name' => '[Laptop] Công nghệ màn hình', 'value' => '3ms IPS-level, 500 nits, 100% DCI-P3, anti-glare display'],
                    ['name' => '[Laptop] Dung lượng RAM', 'value' => '16GB'],
                    ['name' => '[Laptop] Loại RAM', 'value' => 'DDR5'],
                    ['name' => '[Laptop] Bus RAM', 'value' => '4800Mhz'],
                    ['name' => '[Laptop] Số khe cắm RAM', 'value' => '2'],
                    ['name' => '[Laptop] Hỗ trợ RAM tối đa', 'value' => '32GB'],
                    ['name' => '[Laptop] Pin', 'value' => '4-cell, 90WHrs'],
                    ['name' => '[Laptop] Ổ cứng', 'value' => '512GB PCIe® 4.0 NVMe™ M.2 SSD'],
                    ['name' => '[Laptop] Dung lượng ổ cứng', 'value' => '512GB'],
                    ['name' => '[Laptop] Số khe ổ cứng', 'value' => '2'],
                    ['name' => '[Laptop] Cân nặng', 'value' => '2.50 Kg'],
                    ['name' => '[Laptop] Màu sắc', 'value' => 'Eclipse Gray'],
                    ['name' => '[Laptop] Camera', 'value' => '720P HD camera'],
                    ['name' => '[Laptop] OS', 'value' => 'Windows 11 Home']
                ]
            ]
        ];

        foreach ($laptops as $laptopData) {
            $laptop = Laptop::create([
                'name' => $laptopData['name'],
                'category_id' => $laptopData['category_id'],
            ]);

            foreach ($laptopData['attributes'] as $attr) {
                $attribute = Attribute::firstOrCreate(['name' => $attr['name']]);
                LaptopAttribute::create([
                    'laptop_id' => $laptop->id,
                    'attribute_id' => $attribute->id,
                    'value' => $attr['value'],
                ]);
            }
        }
    }
}
