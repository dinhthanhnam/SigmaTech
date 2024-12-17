<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Laptop;
use App\Models\Attribute;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LaptopfilterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Kiểm thử trả về 404 khi sản phẩm không tồn tại
     * 
     * @test
     */
    public function it_displays_correct_laptop_filter()
    {
        $search = 'HP';
        $laptop = Laptop::factory()->create([
            'name' => 'Predator Helios 300',
            'category_id' => 1, 
        ]);

        $attributes = Attribute::factory()->createMany([
            ['name' => '[Laptop] Loại laptop'],
            ['name' => 'Brand'],
            ['name' => 'Price'],
            ['name' => 'Deal Price'],
        ]);

        $laptop->attributes()->attach([
            $attributes->firstWhere('name', '[Laptop] Loại laptop')->id => ['value' => 'Gaming'],
            $attributes->firstWhere('name', 'Brand')->id => ['value' => 'HP'],
            $attributes->firstWhere('name', 'Price')->id => ['value' => 40990000],
            $attributes->firstWhere('name', 'Deal Price')->id => ['value' => 40990000],
        ]);

        $response = $this->get("/laptops/filter?brand={$search}");
        
        $response->assertStatus(200);
        $response->assertViewHas('laptops');
        $response->assertSee('HP');
        $response->assertSee(number_format(intval(40990000), 0, ',', '.'));
    }
    /**
     * Kiểm thử trả về 404 khi sản phẩm không tồn tại
     * 
     * @test
     */
    public function it_shows_404_if_product_does_not_exist()
    {
        $response = $this->get('/laptops/filte?brand=Razer'); 
        $response->assertStatus(404); 
    }
}