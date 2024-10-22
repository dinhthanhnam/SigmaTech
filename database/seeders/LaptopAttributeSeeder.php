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
            ['laptop_id' => 1, 'attribute_id' => 4, 'value' => 'Intel Core i7-13650HX']
        ]);
    }
}
