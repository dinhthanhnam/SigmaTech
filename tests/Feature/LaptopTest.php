<?php

namespace Tests\Feature;

use App\Models\Laptop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LaptopTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_laptops_should_have_27_records(): void
    {
        $this->assertDatabaseCount('laptops', 27);
    }

    public function test_on_top_laptops_should_show(): void
    {
        $response = $this->get('/laptops/Gaming');

        $response->assertStatus(200);

        $data = $response->original->getData();

        $topGamingLaptops = $data['topGamingLaptops'];

        $this->assertLessThanOrEqual(10, $topGamingLaptops->count());
    }

    public function test_paginated_laptops_shouldnt_have_13th_record(): void
    {
        $laptop13 = Laptop::where('name', 'Laptop Acer Predator Helios 16 PH16-72-95ZM')->first();
        $response = $this->get('/laptops/Gaming');

        $response->assertStatus(200);
        
        $gamingLaptops = $response->original->getData()['gamingLaptops'];

        $this->assertCount(12, $gamingLaptops);

        $this->assertFalse($gamingLaptops->contains('name', $laptop13->name));
    }


}
