<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 2; $i <= 100; $i++) {
            User::factory()->create([
                'name' => 'user' . $i,
                'password' => bcrypt('user' . $i), // Mã hóa mật khẩu
                'email' => 'user' . $i . '@example.com',
                'gender' => $i % 2 == 0 ? 1 : 0, // Xen kẽ giới tính: 1 (nam), 0 (nữ)
                'address' => 'Hà Nội, Địa chỉ số ' . $i,
                'phone' => '012345678' . str_pad($i, 2, '0', STR_PAD_LEFT), // Tạo số điện thoại với đuôi 2 chữ số
            ]);
        }
    }
}
?>