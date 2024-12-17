<?php
namespace Tests\Feature;
use Tests\TestCase;
use App\Models\Laptop;
use App\Models\Attribute;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchTest extends TestCase
{
    use RefreshDatabase;
    public function it_displays_correct_product_details()
    {
        $search = 'Predator';
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
            $attributes->firstWhere('name', 'Brand')->id => ['value' => 'Acer'],
            $attributes->firstWhere('name', 'Price')->id => ['value' => 40990000],
            $attributes->firstWhere('name', 'Deal Price')->id => ['value' => 40990000],
        ]);

        $response = $this->get("/search?scat_id=&q={$search}");
        
        $response->assertStatus(200);
        $response->assertViewHas('searchresults');
        $response->assertSee('Predator');
        $response->assertSee(number_format(intval(40990000), 0, ',', '.'));
    }
}