<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CpuAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cpu_attribute')->insert([
            ['cpu_id' => 1, 'attribute_id' => 27, 'value' => 'Intel LGA1700']
        ]);
    }
}
