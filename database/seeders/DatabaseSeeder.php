<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CpuTableSeeder;
use Database\Seeders\AttributeSeeder;
use Database\Seeders\LaptopSeeder;
use Database\Seeders\LaptopAttributeSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'password' => 'admin',
            'email' => 'admin@example.com',
            'utype' => 'ADM',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user1',
            'password' => 'user1',
            'email' => 'user1@example.com',
            'gender' => 1,
            'address'=> 'Hà Nội, Âu Cơ Tây Hồ',
            'phone' => '01231231414',
        ]);
        //seed category, vì nó là khoá ngoại cho các sản phẩm như laptop, abc 
        $this->call(CategorySeeder::class);
        // seed attribute trước vì nó có phục vụ cho CPU
        $this->call(AttributeSeeder::class);
        //CPU seed
        $this->call(CpuSeeder::class);
        $this->call(CpuAttributeSeeder::class);
        //sau khi seed CPU, seed đến laptop
        $this->call(LaptopSeeder::class);
        //
        $this->call(LaptopAttributeSeeder::class);
    }
}
