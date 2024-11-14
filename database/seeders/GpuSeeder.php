<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Gpu;
use App\Models\GpuAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GpuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gpus = [
            [
                'name' => 'NVIDIA GeForce RTX 3060 Ti',
                'category_id' => 3,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'NVIDIA'],
                    ['name' => 'Model', 'value' => 'RTX3060Ti'],
                    ['name' => 'Price', 'value' => '12000000'],
                    ['name' => 'Deal Price', 'value' => '11000000'],
                    ['name' => 'Rating', 'value' => '4.5'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/1/Image1.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/1/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/1/Image1.jpg'],
                    ['name' => 'Image2', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/1/Image2.jpg'],
                    ['name' => 'Image3', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/1/Image3.jpg'],
                    ['name' => 'Image4', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/1/Image4.jpg'],
                    ['name' => 'Image5', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/1/Image5.jpg'],
                    ['name' => '[GPU] Bộ nhớ', 'value' => '8GB GDDR6'],
                    ['name' => '[GPU] Core Clock', 'value' => '1605 MHz'],
                    ['name' => '[GPU] Lõi', 'value' => '4864'],
                    ['name' => '[GPU] Clock bộ nhớ', 'value' => '14000 MHz'],
                    ['name' => '[GPU] Giao diện bộ nhớ', 'value' => '256-bit'],
                    ['name' => '[GPU] Độ phân giải', 'value' => '7680x4320'],
                    ['name' => '[GPU] Kết nối', 'value' => 'HDMI, DisplayPort'],
                    ['name' => '[GPU] Kích thước', 'value' => '267mm x 112mm'],
                    ['name' => '[GPU] PSU đề nghị', 'value' => '650W'],
                    ['name' => '[GPU] Power Connectors', 'value' => '1x 8-pin'],
                    ['name' => '[GPU] Hỗ trợ SLI', 'value' => 'Không'],
                ]
            ],
            [
                'name' => 'NVIDIA GeForce RTX 4060',
                'category_id' => 3,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'NVIDIA'],
                    ['name' => 'Model', 'value' => 'RTX4060'],
                    ['name' => 'Price', 'value' => '15000000'],
                    ['name' => 'Deal Price', 'value' => '14500000'],
                    ['name' => 'Rating', 'value' => '4.7'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/2/Image1.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/2/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/2/Image1.jpg'],
                    ['name' => 'Image2', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/2/Image2.jpg'],
                    ['name' => 'Image3', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/2/Image3.jpg'],
                    ['name' => 'Image4', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/2/Image4.jpg'],
                    ['name' => '[GPU] Bộ nhớ', 'value' => '8GB GDDR6'],
                    ['name' => '[GPU] Core Clock', 'value' => '1730 MHz'],
                    ['name' => '[GPU] Lõi', 'value' => '5888'],
                    ['name' => '[GPU] Clock bộ nhớ', 'value' => '14000 MHz'],
                    ['name' => '[GPU] Giao diện bộ nhớ', 'value' => '256-bit'],
                    ['name' => '[GPU] Độ phân giải', 'value' => '7680x4320'],
                    ['name' => '[GPU] Kết nối', 'value' => 'HDMI, DisplayPort'],
                    ['name' => '[GPU] Kích thước', 'value' => '267mm x 112mm'],
                    ['name' => '[GPU] PSU đề nghị', 'value' => '650W'],
                    ['name' => '[GPU] Power Connectors', 'value' => '1x 8-pin'],
                    ['name' => '[GPU] Hỗ trợ SLI', 'value' => 'Không'],
                ]
            ],
            [
                'name' => 'NVIDIA GeForce RTX 4070',
                'category_id' => 3,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'NVIDIA'],
                    ['name' => 'Model', 'value' => 'RTX4070'],
                    ['name' => 'Price', 'value' => '25000000'],
                    ['name' => 'Deal Price', 'value' => '24000000'],
                    ['name' => 'Rating', 'value' => '4.8'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/3/Image1.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/3/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/3/Image1.jpg'],
                    ['name' => 'Image2', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/3/Image2.jpg'],
                    ['name' => 'Image3', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/3/Image3.jpg'],
                    ['name' => 'Image4', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/3/Image4.jpg'],
                    ['name' => '[GPU] Bộ nhớ', 'value' => '10GB GDDR6X'],
                    ['name' => '[GPU] Core Clock', 'value' => '1440 MHz'],
                    ['name' => '[GPU] Lõi', 'value' => '8704'],
                    ['name' => '[GPU] Clock bộ nhớ', 'value' => '19000 MHz'],
                    ['name' => '[GPU] Giao diện bộ nhớ', 'value' => '320-bit'],
                    ['name' => '[GPU] Độ phân giải', 'value' => '7680x4320'],
                    ['name' => '[GPU] Kết nối', 'value' => 'HDMI, DisplayPort'],
                    ['name' => '[GPU] Kích thước', 'value' => '267mm x 112mm'],
                    ['name' => '[GPU] PSU đề nghị', 'value' => '750W'],
                    ['name' => '[GPU] Power Connectors', 'value' => '2x 8-pin'],
                    ['name' => '[GPU] Hỗ trợ SLI', 'value' => 'Không'],
                ]
            ],
            [
                'name' => 'NVIDIA GeForce RTX 4070 Ti',
                'category_id' => 3,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'NVIDIA'],
                    ['name' => 'Model', 'value' => 'RTX4070Ti'],
                    ['name' => 'Price', 'value' => '30000000'],
                    ['name' => 'Deal Price', 'value' => '29000000'],
                    ['name' => 'Rating', 'value' => '4.9'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/4/Image1.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/4/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/4/Image1.jpg'],
                    ['name' => 'Image2', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/4/Image2.jpg'],
                    ['name' => 'Image3', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/4/Image3.jpg'],
                    ['name' => 'Image4', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/4/Image4.jpg'],
                    ['name' => 'Image5', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/4/Image5.jpg'],
                    ['name' => '[GPU] Bộ nhớ', 'value' => '12GB GDDR6X'],
                    ['name' => '[GPU] Core Clock', 'value' => '1665 MHz'],
                    ['name' => '[GPU] Lõi', 'value' => '10240'],
                    ['name' => '[GPU] Clock bộ nhớ', 'value' => '19000 MHz'],
                    ['name' => '[GPU] Giao diện bộ nhớ', 'value' => '384-bit'],
                    ['name' => '[GPU] Độ phân giải', 'value' => '7680x4320'],
                    ['name' => '[GPU] Kết nối', 'value' => 'HDMI, DisplayPort'],
                    ['name' => '[GPU] Kích thước', 'value' => '267mm x 112mm'],
                    ['name' => '[GPU] PSU đề nghị', 'value' => '750W'],
                    ['name' => '[GPU] Power Connectors', 'value' => '2x 8-pin'],
                    ['name' => '[GPU] Hỗ trợ SLI', 'value' => 'Không'],
                ]
            ],
            [
                'name' => 'NVIDIA GeForce RTX 4080',
                'category_id' => 3,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'NVIDIA'],
                    ['name' => 'Model', 'value' => 'RTX4080'],
                    ['name' => 'Price', 'value' => '40000000'],
                    ['name' => 'Deal Price', 'value' => '39000000'],
                    ['name' => 'Rating', 'value' => '5.0'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/5/Image1.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/5/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/5/Image1.jpg'],
                    ['name' => 'Image2', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/5/Image2.jpg'],
                    ['name' => 'Image3', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/5/Image3.jpg'],
                    ['name' => 'Image4', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/5/Image4.jpg'],
                    ['name' => 'Image5', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/5/Image5.jpg'],
                    ['name' => '[GPU] Bộ nhớ', 'value' => '24GB GDDR6X'],
                    ['name' => '[GPU] Core Clock', 'value' => '1400 MHz'],
                    ['name' => '[GPU] Lõi', 'value' => '10496'],
                    ['name' => '[GPU] Clock bộ nhớ', 'value' => '19500 MHz'],
                    ['name' => '[GPU] Giao diện bộ nhớ', 'value' => '384-bit'],
                    ['name' => '[GPU] Độ phân giải', 'value' => '7680x4320'],
                    ['name' => '[GPU] Kết nối', 'value' => 'HDMI, DisplayPort'],
                    ['name' => '[GPU] Kích thước', 'value' => '313mm x 138mm'],
                    ['name' => '[GPU] PSU đề nghị', 'value' => '750W'],
                    ['name' => '[GPU] Power Connectors', 'value' => '3x 8-pin'],
                    ['name' => '[GPU] Hỗ trợ SLI', 'value' => 'Không'],
                ]
            ],
            [
                'name' => 'NVIDIA GeForce RTX 4090',
                'category_id' => 3,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'NVIDIA'],
                    ['name' => 'Model', 'value' => 'RTX4090'],
                    ['name' => 'Price', 'value' => '50000000'],
                    ['name' => 'Deal Price', 'value' => '48000000'],
                    ['name' => 'Rating', 'value' => '5.0'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/6/Image1.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/6/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/6/Image1.jpg'],
                    ['name' => 'Image2', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/6/Image2.jpg'],
                    ['name' => 'Image3', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/6/Image3.jpg'],
                    ['name' => 'Image4', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/6/Image4.jpg'],
                    ['name' => 'Image5', 'value' => '/assets/img/products/pc-parts/gpu/NVIDIA/6/Image5.jpg'],
                    ['name' => '[GPU] Bộ nhớ', 'value' => '24GB GDDR6X'],
                    ['name' => '[GPU] Core Clock', 'value' => '2235 MHz'],
                    ['name' => '[GPU] Lõi', 'value' => '16384'],
                    ['name' => '[GPU] Clock bộ nhớ', 'value' => '21000 MHz'],
                    ['name' => '[GPU] Giao diện bộ nhớ', 'value' => '384-bit'],
                    ['name' => '[GPU] Độ phân giải', 'value' => '7680x4320'],
                    ['name' => '[GPU] Kết nối', 'value' => 'HDMI, DisplayPort'],
                    ['name' => '[GPU] Kích thước', 'value' => '304mm x 137mm'],
                    ['name' => '[GPU] PSU đề nghị', 'value' => '850W'],
                    ['name' => '[GPU] Power Connectors', 'value' => '1x 16-pin'],
                    ['name' => '[GPU] Hỗ trợ SLI', 'value' => 'Không'],
                ]
            ],
            [
                'name' => 'AMD Radeon RX 6500 XT',
                'category_id' => 3,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'AMD'],
                    ['name' => 'Model', 'value' => 'RX6500XT'],
                    ['name' => 'Price', 'value' => '13000000'],
                    ['name' => 'Deal Price', 'value' => '12500000'],
                    ['name' => 'Rating', 'value' => '4.5'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/pc-parts/gpu/AMD/1/Image1.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/pc-parts/gpu/AMD/1/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/pc-parts/gpu/AMD/1/Image1.jpg'],
                    ['name' => 'Image2', 'value' => '/assets/img/products/pc-parts/gpu/AMD/1/Image2.jpg'],
                    ['name' => 'Image3', 'value' => '/assets/img/products/pc-parts/gpu/AMD/1/Image3.jpg'],
                    ['name' => 'Image4', 'value' => '/assets/img/products/pc-parts/gpu/AMD/1/Image4.jpg'],
                    ['name' => 'Image5', 'value' => '/assets/img/products/pc-parts/gpu/AMD/1/Image5.jpg'],
                    ['name' => '[GPU] Bộ nhớ', 'value' => '12GB GDDR6'],
                    ['name' => '[GPU] Core Clock', 'value' => '2321 MHz'],
                    ['name' => '[GPU] Lõi', 'value' => '2560'],
                    ['name' => '[GPU] Clock bộ nhớ', 'value' => '16000 MHz'],
                    ['name' => '[GPU] Giao diện bộ nhớ', 'value' => '192-bit'],
                    ['name' => '[GPU] Độ phân giải', 'value' => '7680x4320'],
                    ['name' => '[GPU] Kết nối', 'value' => 'HDMI, DisplayPort'],
                    ['name' => '[GPU] Kích thước', 'value' => '267mm x 110mm'],
                    ['name' => '[GPU] PSU đề nghị', 'value' => '650W'],
                    ['name' => '[GPU] Power Connectors', 'value' => '1x 8-pin, 1x 6-pin'],
                    ['name' => '[GPU] Hỗ trợ SLI', 'value' => 'Có'],
                ]
            ],
            [
                'name' => 'AMD Radeon RX 6600',
                'category_id' => 3,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'AMD'],
                    ['name' => 'Model', 'value' => 'RX6600'],
                    ['name' => 'Price', 'value' => '20000000'],
                    ['name' => 'Deal Price', 'value' => '19500000'],
                    ['name' => 'Rating', 'value' => '4.7'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/pc-parts/gpu/AMD/2/Image1.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/pc-parts/gpu/AMD/2/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/pc-parts/gpu/AMD/2/Image1.jpg'],
                    ['name' => 'Image2', 'value' => '/assets/img/products/pc-parts/gpu/AMD/2/Image2.jpg'],
                    ['name' => 'Image3', 'value' => '/assets/img/products/pc-parts/gpu/AMD/2/Image3.jpg'],
                    ['name' => 'Image4', 'value' => '/assets/img/products/pc-parts/gpu/AMD/2/Image4.jpg'],
                    ['name' => '[GPU] Bộ nhớ', 'value' => '16GB GDDR6'],
                    ['name' => '[GPU] Core Clock', 'value' => '1815 MHz'],
                    ['name' => '[GPU] Lõi', 'value' => '3840'],
                    ['name' => '[GPU] Clock bộ nhớ', 'value' => '16000 MHz'],
                    ['name' => '[GPU] Giao diện bộ nhớ', 'value' => '256-bit'],
                    ['name' => '[GPU] Độ phân giải', 'value' => '7680x4320'],
                    ['name' => '[GPU] Kết nối', 'value' => 'HDMI, DisplayPort'],
                    ['name' => '[GPU] Kích thước', 'value' => '267mm x 120mm'],
                    ['name' => '[GPU] PSU đề nghị', 'value' => '750W'],
                    ['name' => '[GPU] Power Connectors', 'value' => '2x 8-pin'],
                    ['name' => '[GPU] Hỗ trợ SLI', 'value' => 'Có'],
                ]
            ],
            [
                'name' => 'AMD Radeon RX 7600 XT',
                'category_id' => 3,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'AMD'],
                    ['name' => 'Model', 'value' => 'RX7600XT'],
                    ['name' => 'Price', 'value' => '30000000'],
                    ['name' => 'Deal Price', 'value' => '29000000'],
                    ['name' => 'Rating', 'value' => '4.8'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/pc-parts/gpu/AMD/3/Image1.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/pc-parts/gpu/AMD/3/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/pc-parts/gpu/AMD/3/Image1.jpg'],
                    ['name' => 'Image2', 'value' => '/assets/img/products/pc-parts/gpu/AMD/3/Image2.jpg'],
                    ['name' => 'Image3', 'value' => '/assets/img/products/pc-parts/gpu/AMD/3/Image3.jpg'],
                    ['name' => 'Image4', 'value' => '/assets/img/products/pc-parts/gpu/AMD/3/Image4.jpg'],
                    ['name' => 'Image5', 'value' => '/assets/img/products/pc-parts/gpu/AMD/3/Image5.jpg'],
                    ['name' => '[GPU] Bộ nhớ', 'value' => '16GB GDDR6'],
                    ['name' => '[GPU] Core Clock', 'value' => '1825 MHz'],
                    ['name' => '[GPU] Lõi', 'value' => '5120'],
                    ['name' => '[GPU] Clock bộ nhớ', 'value' => '16000 MHz'],
                    ['name' => '[GPU] Giao diện bộ nhớ', 'value' => '256-bit'],
                    ['name' => '[GPU] Độ phân giải', 'value' => '7680x4320'],
                    ['name' => '[GPU] Kết nối', 'value' => 'HDMI, DisplayPort'],
                    ['name' => '[GPU] Kích thước', 'value' => '267mm x 120mm'],
                    ['name' => '[GPU] PSU đề nghị', 'value' => '850W'],
                    ['name' => '[GPU] Power Connectors', 'value' => '2x 8-pin'],
                    ['name' => '[GPU] Hỗ trợ SLI', 'value' => 'Có'],
                ]
            ],
            [
                'name' => 'AMD Radeon RX 7900 XTX',
                'category_id' => 3,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'AMD'],
                    ['name' => 'Model', 'value' => 'RX7900XTX'],
                    ['name' => 'Price', 'value' => '45000000'],
                    ['name' => 'Deal Price', 'value' => '44000000'],
                    ['name' => 'Rating', 'value' => '5.0'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/pc-parts/gpu/AMD/4/Image1.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/pc-parts/gpu/AMD/4/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/pc-parts/gpu/AMD/4/Image1.jpg'],
                    ['name' => 'Image2', 'value' => '/assets/img/products/pc-parts/gpu/AMD/4/Image2.jpg'],
                    ['name' => 'Image3', 'value' => '/assets/img/products/pc-parts/gpu/AMD/4/Image3.jpg'],
                    ['name' => 'Image4', 'value' => '/assets/img/products/pc-parts/gpu/AMD/4/Image4.jpg'],
                    ['name' => '[GPU] Bộ nhớ', 'value' => '24GB GDDR6'],
                    ['name' => '[GPU] Core Clock', 'value' => '1900 MHz'],
                    ['name' => '[GPU] Lõi', 'value' => '6144'],
                    ['name' => '[GPU] Clock bộ nhớ', 'value' => '20000 MHz'],
                    ['name' => '[GPU] Giao diện bộ nhớ', 'value' => '384-bit'],
                    ['name' => '[GPU] Độ phân giải', 'value' => '7680x4320'],
                    ['name' => '[GPU] Kết nối', 'value' => 'HDMI, DisplayPort'],
                    ['name' => '[GPU] Kích thước', 'value' => '300mm x 140mm'],
                    ['name' => '[GPU] PSU đề nghị', 'value' => '850W'],
                    ['name' => '[GPU] Power Connectors', 'value' => '3x 8-pin'],
                    ['name' => '[GPU] Hỗ trợ SLI', 'value' => 'Có'],
                ]
            ]
        ];
        
        

        foreach ($gpus as $gpuData) {
            $gpu = Gpu::create([
                'name' => $gpuData['name'],
                'category_id' => $gpuData['category_id'],
            ]);
        
            foreach ($gpuData['attributes'] as $attr) {
                $attribute = Attribute::firstOrCreate(['name' => $attr['name']]);
                GPUAttribute::create([
                    'gpu_id' => $gpu->id,
                    'attribute_id' => $attribute->id,
                    'value' => $attr['value'],
                ]);
            }
        }
    }
}
