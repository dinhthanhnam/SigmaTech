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

        // Danh sách tên mẫu để random
        $names = [
            'Nguyễn Văn A', 'Trần Thị B', 'Lê Hoàng C', 'Phạm Hồng D',
            'Hoàng Văn E', 'Đỗ Thị F', 'Bùi Quốc G', 'Vũ Ngọc H',
            'Trương Thị K', 'Ngô Anh M', 'Mai Quang N', 'Phạm Thu O',
            'Đinh Tiến P', 'Trần Văn Q', 'Nguyễn Minh R', 'Lý Hồng S'
        ];

        for ($i = 0; $i < 100; $i++) {
            $userId = rand(1, 100); // Random user_id từ 1 đến 100
            $gender = rand(0, 1); // Random giới tính (0: Nữ, 1: Nam)
            $phoneNumber = '03' . rand(10000000, 99999999); // Random số điện thoại 10 chữ số
            $shippingAddress = 'Địa chỉ số ' . rand(1, 100) . ', Hà Nội'; // Địa chỉ giả lập
            $paymentMethods = ['cod', 'QR']; // Các phương thức thanh toán
            $paymentMethod = $paymentMethods[array_rand($paymentMethods)]; // Chọn random 1 phương thức thanh toán
            $status = 3; // Random trạng thái từ 1 đến 5
            $totalPrice = rand(50, 1000) * 1000; // Random tổng giá trị từ 50.000 đến 1.000.000

            $insertData[] = [
                'user_id' => $userId,
                'customer_name' => $names[array_rand($names)], // Chọn ngẫu nhiên tên từ danh sách
                'gender' => $gender,
                'phone_number' => $phoneNumber,
                'shipping_address' => $shippingAddress,
                'payment_method' => $paymentMethod,
                'note' => null,
                'status' => $status,
                'total_price' => $totalPrice,
                'created_at' => $baseDate->addHours(rand(1, 24))->format('Y-m-d H:i:s'), // Random thời gian trong khoảng 1 tiếng
                'updated_at' => $baseDate->addHours(rand(1, 24))->format('Y-m-d H:i:s'), // Random thời gian cập nhật
                'deleted_at' => null,
            ];
        }

        // Thực hiện insert
        DB::table('orders')->insert($insertData);
    }
}
