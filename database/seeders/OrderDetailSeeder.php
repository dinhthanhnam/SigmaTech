<?php

namespace Database\Seeders;

use App\Models\Laptop;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::all();
        $laptops = Laptop::with('attributes')->get();

        if ($orders->isEmpty() || $laptops->isEmpty()) {
            // Dừng nếu không có orders hoặc laptops
            return;
        }

        foreach ($orders as $order) {
            $totalOrderPrice = 0; // Tổng giá trị đơn hàng
            $orderDetails = []; // Tập hợp các bản ghi chi tiết đơn hàng

            for ($i = 0; $i < rand(1, 5); $i++) {
                $randomLaptop = $laptops->random();

                // Lấy giá "Deal Price" nếu có
                $dealPriceAttribute = $randomLaptop->attributes->firstWhere('name', 'Deal Price');
                $price = $dealPriceAttribute ? (int)$dealPriceAttribute->pivot->value : 42000000;

                $quantity = rand(1, 3);
                $totalPrice = $price * $quantity;

                // Thêm vào tổng giá trị đơn hàng
                $totalOrderPrice += $totalPrice;

                // Tạo bản ghi chi tiết đơn hàng
                $orderDetails[] = [
                    'order_id' => $order->id,
                    'product_type' => 'laptop',
                    'product_id' => $randomLaptop->id,
                    'quantity' => $quantity,
                    'price' => $totalPrice,
                    'created_at' => $order->created_at,
                    'updated_at' => $order->updated_at,
                    'deleted_at' => null,
                ];
            }

            // Thực hiện ghi dữ liệu chi tiết đơn hàng
            DB::table('order_details')->insert($orderDetails);

            // Cập nhật tổng giá trị đơn hàng
            $order->update(['total_price' => $totalOrderPrice]);
        }
    }
}
