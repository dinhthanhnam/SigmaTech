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
        foreach ($orders as $order) {
            for($i = 0; $i < rand(1,3) ; $i++) {
                $randomLaptop = $laptops->random();
                $dealPriceAttribute = $randomLaptop->attributes->firstWhere('name','Deal Price');
                $price = $dealPriceAttribute ? (int) $dealPriceAttribute->pivot->value : 42000000;
                $quantity = rand(1, 3);
                $totalPrice = $price * $quantity; // Tính tổng giá trị
                DB::table('order_details')->insert([
                    'order_id' => $order->id,
                    'product_type' => 'laptops',
                    'product_id' => $randomLaptop->id,  // Sử dụng ID của laptop đã chọn
                    'quantity' => $quantity,
                    'price' => $totalPrice,
                    'created_at' => $order->created_at,
                    'updated_at' => $order->updated_at,
                    'deleted_at' => null,
                ]);
            }
        }
    }
}
