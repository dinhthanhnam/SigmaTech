<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
    }
}
