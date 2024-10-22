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
            //Attribute dùng chung cho nhiều loại
            ['name' => 'Brand', 'data_type' => 'string'],
            ['name' => 'Model', 'data_type' => 'string'],
            //laptop_attribute
            
            ['name' => 'Loại laptop', 'data_type' => 'string'],
            ['name' => 'Vi xử lý', 'data_type' => 'string'],
            ['name' => 'Card đồ hoạ', 'data_type' => 'string'],
            ['name' => 'Màn hình máy tính', 'data_type' => 'string'],
            ['name' => 'Dung lượng RAM', 'data_type' => 'string'],
            ['name' => 'Dung lượng Pin', 'data_type' => 'string'],
            ['name' => 'Ổ cứng', 'data_type' => 'string'],
            ['name' => 'Câng nặng', 'data_type' => 'string'],
            ['name' => 'Tính năng', 'data_type' => 'string'],
            ['name' => 'Màu sắc', 'data_type' => 'string'],
            ['name' => 'OS', 'data_type' => 'string'],

            //CPU_attribute
            ['name' => 'Core', 'data_type' => 'integer'],
            ['name' => 'ECore', 'data_type' => 'integer'],
            ['name' => 'PCore', 'data_type' => 'integer'],
            ['name' => 'Thread', 'data_type' => 'integer'],
            ['name' => 'BaseSpeed', 'data_type' => 'string'],
            ['name' => 'MaxSpeed', 'data_type' => 'string'],
            ['name' => 'Cache', 'data_type' => 'string'],
            // GPU_attribute
        ]);
    }
}
