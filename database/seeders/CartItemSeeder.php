<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CartItem;
use App\Models\Laptop;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($userId = 2; $userId <= 100; $userId++) {
            // Lấy số lượng sản phẩm ngẫu nhiên (giả sử từ 1 đến 5)
            $cartItemCount = rand(1, 5);

            // Tạo các CartItem ngẫu nhiên cho mỗi user
            for ($i = 0; $i < $cartItemCount; $i++) {
                $product = Laptop::inRandomOrder()->first();
                CartItem::create([
                    'user_id' => $userId, // user_id từ 2 đến 100
                    'product_type' => 'laptop', // Loại sản phẩm ngẫu nhiên
                    'product_id' => $product->id, // ID sản phẩm ngẫu nhiên, giả sử từ 1 đến 50
                    'name' => $product->name, // Tên sản phẩm ngẫu nhiên
                    'quantity' => rand(1, 10), // Số lượng ngẫu nhiên từ 1 đến 10
                ]);
            }
        }
    }
}
