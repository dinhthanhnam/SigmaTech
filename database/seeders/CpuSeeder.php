<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Cpu;
use App\Models\CPUAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CpuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cpus = [
            [
                'name' => 'Intel Core i5-14400F',
                'category_id' => 3,
                'attributes' => [
                ['name' => 'Brand', 'value' => 'Intel'],
                ['name' => 'Model', 'value' => 'CPUI14400F'],
                ['name' => 'Price', 'value' => '5030000'],
                ['name' => 'Deal Price', 'value' => '4290000'],
                ['name' => 'Rating', 'value' => '5'],
                ['name' => '[CPU] Socket', 'value' => 'LGA1700'],
                ['name' => '[CPU] Tốc độ cơ bản', 'value' => '2500'],
                ['name' => '[CPU] Tốc độ tối đa', 'value' => '4600'], 
                ['name' => '[CPU] Nhân CPU', 'value' => '6'],
                ['name' => '[CPU] Luồng CPU', 'value' => '12'],
                ['name' => '[CPU] Số P-core', 'value' => '6'],
                ['name' => '[CPU] Số E-core', 'value' => '4'],
                ['name' => '[CPU] Bộ nhớ hỗ trợ', 'value' => 'DDR4, DDR5'],
                ['name' => '[CPU] Kích thước bộ nhớ tối đa', 'value' => '128GB'],
                ['name' => '[CPU] Số kênh bộ nhớ tối đa', 'value' => '2'],
                ['name' => '[CPU] Điện áp tiêu thụ tối đa', 'value' => '65W'],
                ['name' => '[CPU] Công suất cơ bản', 'value' => '65W'],
                ['name' => '[CPU] Tính năng', 'value' => 'Intel Turbo Boost, Intel Hyper-Threading'],
                ['name' => '[CPU] Thuật in thạch bản', 'value' => '10nm'],
                ]
            ]    
        ];
        foreach ($cpus as $cpuData) {
            $cpu = Cpu::create([
                'name' => $cpuData['name'],
                'category_id' => $cpuData['category_id'],
            ]);
        
            foreach ($cpuData['attributes'] as $attr) {
                $attribute = Attribute::firstOrCreate(['name' => $attr['name']]);
                CPUAttribute::create([
                    'cpu_id' => $cpu->id,
                    'attribute_id' => $attribute->id,
                    'value' => $attr['value'],
                ]);
            }
        }
    }
}
