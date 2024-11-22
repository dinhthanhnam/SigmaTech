<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $insertData = [];
        $baseDate = Carbon::parse('2024-10-20 13:42:36'); // Ngày bắt đầu

        for ($i = 0; $i < 80; $i++) {
            $insertData[] = [
                'user_id' => 2,
                'customer_name' => 'Nam',
                'gender' => 1,
                'phone_number' => '0382027003',
                'shipping_address' => 'Tứ Liên Âu Cơ Tây Hồ',
                'payment_method' => 'cod',
                'note' => null,
                'status' => 3,
                'total_price'=> 100,
                'created_at' => $baseDate->addHours(9)->format('Y-m-d H:i:s'),
                'updated_at' => $baseDate->addHours(9)->addSeconds(2)->format('Y-m-d H:i:s'), // Tăng dần 12 tiếng
                'deleted_at' => null,
            ];
        }

        // Thực hiện insert
        DB::table('orders')->insert($insertData);
    }
}
