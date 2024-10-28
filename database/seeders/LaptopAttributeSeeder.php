<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LaptopAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('laptop_attribute')->insert([
            //bắt đầu laptop với mã 1
            ['laptop_id' => 1, 'attribute_id' => 1, 'value' => 'Asus'],
            ['laptop_id' => 1, 'attribute_id' => 2, 'value' => 'NBAS1394'],
            ['laptop_id' => 1, 'attribute_id' => 3, 'value' => 'Gaming'],
            ['laptop_id' => 1, 'attribute_id' => 4, 'value' => 'Intel Core i7-13650HX'],
            ['laptop_id' => 1, 'attribute_id' => 5, 'value' => '14'],
            ['laptop_id' => 1, 'attribute_id' => 6, 'value' => '20'],
            ['laptop_id' => 1, 'attribute_id' => 7, 'value' => 'upto 4.90 GHz'],
            ['laptop_id' => 1, 'attribute_id' => 8, 'value' => '24MB'],
            ['laptop_id' => 1, 'attribute_id' => 9, 'value' => 'NVIDIA GeForce RTX 4060 8GB GDDR6'],
            ['laptop_id' => 1, 'attribute_id' => 10, 'value' => '16 inch 16:10'],
            ['laptop_id' => 1, 'attribute_id' => 11, 'value' => 'QHD+ (2560 x 1600, WQXGA)'],
            ['laptop_id' => 1, 'attribute_id' => 12, 'value' => '240Hz'],
            ['laptop_id' => 1, 'attribute_id' => 13, 'value' => '3ms IPS-level, 500 nits, 100% DCI-P3, anti-glare display'],
            ['laptop_id' => 1, 'attribute_id' => 14, 'value' => '16GB SO-DIMM'],
            ['laptop_id' => 1, 'attribute_id' => 15, 'value' => 'DDR5'],
            ['laptop_id' => 1, 'attribute_id' => 16, 'value' => '4800Mhz'],
            ['laptop_id' => 1, 'attribute_id' => 17, 'value' => '2'],
            ['laptop_id' => 1, 'attribute_id' => 18, 'value' => '32GB'],
            ['laptop_id' => 1, 'attribute_id' => 19, 'value' => '4-cell, 90WHrs'],
            ['laptop_id' => 1, 'attribute_id' => 20, 'value' => '512GB PCIe® 4.0 NVMe™ M.2 SSD'],
            ['laptop_id' => 1, 'attribute_id' => 21, 'value' => '512GB'],
            ['laptop_id' => 1, 'attribute_id' => 22, 'value' => '2'],
            ['laptop_id' => 1, 'attribute_id' => 23, 'value' => '2.50 Kg'],
            ['laptop_id' => 1, 'attribute_id' => 24, 'value' => 'Eclipse Gray'],
            ['laptop_id' => 1, 'attribute_id' => 25, 'value' => 'Windows 11 Home'],
            ['laptop_id' => 1, 'attribute_id' => 26, 'value' => '720P HD camera'],

        ]);
    }
}
