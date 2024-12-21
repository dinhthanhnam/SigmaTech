<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CartItem;
use App\Models\Laptop;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo CartItem cho mỗi người dùng
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

            // Tính toán và cập nhật các trường đặc trưng cho người dùng
            $user = User::find($userId);
            $lastOrder = Order::where('user_id', $user->id)->latest()->first();
            $recencyDays = $lastOrder ? Carbon::now('Asia/Ho_Chi_Minh')->diffInDays($lastOrder->created_at) : 0;
            $frequency = Order::where('user_id', $user->id)->count();
            $monetary = Order::where('user_id', $user->id)->sum('total_price');
            $cartAbandonRate = CartItem::where('user_id', $user->id)->count();

            // Cập nhật các trường đặc trưng cho user
            $user->update([
                'recency_days' => $recencyDays,
                'frequency' => $frequency,
                'monetary' => $monetary,
                'cart_abandon_rate' => $cartAbandonRate,
            ]);
        }
    }
}

