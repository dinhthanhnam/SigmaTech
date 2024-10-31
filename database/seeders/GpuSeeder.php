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
                    
                    // Các thuộc tính GPU
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
