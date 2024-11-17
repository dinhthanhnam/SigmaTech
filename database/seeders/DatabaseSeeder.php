<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Monitor;
use Illuminate\Database\Seeder;
use Database\Seeders\CpuTableSeeder;
use Database\Seeders\AttributeSeeder;
use Database\Seeders\LaptopSeeder;
use Database\Seeders\LaptopAttributeSeeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'password' => 'admin',
            'email' => 'admin@example.com',
            'utype' => 'ADM',
        ]);
        User::factory()->create([
            'name' => 'user1',
            'password' => 'user1',
            'email' => 'user1@example.com',
            'gender' => 1,
            'address'=> 'Hà Nội, Âu Cơ Tây Hồ',
            'phone' => '01231231414',
        ]);
        $this->call(CategorySeeder::class);
        // seed attribute trước vì nó có phục vụ cho mọi loại hàng
        $this->call(AttributeSeeder::class);

        //CPU seed riêng biệt (CPU rời, lắp case)
        $this->call(CpuSeeder::class);

        //Laptop seed riêng biệt(sau khi seed xong sẽ có đủ thông tin cho 1 laptop cụ thể)
        $this->call(LaptopSeeder::class);

        $this->call(GpuSeeder::class);

        $this->call(MonitorSeeder::class);

        $this->call(GaminggearSeeder::class);

        $this->call(MediaSeeder::class);
    }
}
