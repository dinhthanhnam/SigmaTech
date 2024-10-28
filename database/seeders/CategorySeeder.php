<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Laptop Gaming - Đồ Hoạ'],
            ['name' => 'Laptop Văn Phòng'],
            ['name' => 'Linh Kiện Máy Tính'],
            ['name' => 'Màn Hình Máy Tính'],
            ['name' => 'Bàn Phím, Chuột - Gaming Gear'],
            ['name' => 'Loa, Tai Nghe, Webcam, Tivi'],
            ['name' => 'Cooling, Tản Nhiệt'],
            ['name' => 'Phụ Kiện Laptop, PC, khác'],
        ]);
    }
}
