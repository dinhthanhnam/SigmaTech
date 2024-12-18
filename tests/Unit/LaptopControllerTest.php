<?php

namespace Tests\Unit;

use App\Models\Laptop;
use App\Models\Attribute;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LaptopControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_laptop_details_correctly()
    {
        // Arrange
        $laptop = Laptop::factory()->create();
        $brandAttribute = Attribute::factory()->create(['name' => 'Brand']);
        $typeAttribute = Attribute::factory()->create(['name' => '[Laptop] Loại laptop']);

        $laptop->attributes()->attach([
            $brandAttribute->id => ['value' => 'Dell'],
            $typeAttribute->id => ['value' => 'Gaming'],
        ]);

        // Act
        $response = $this->get("/laptops/Gaming/Dell/{$laptop->id}");

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('single.single-laptop');
        $response->assertViewHas(['laptop', 'laptopType', 'laptopBrand']);
    }

    /** @test */
    public function it_returns_404_if_laptop_details_do_not_match()
    {
        // Arrange
        $laptop = Laptop::factory()->create();
        $brandAttribute = Attribute::factory()->create(['name' => 'Brand']);
        $typeAttribute = Attribute::factory()->create(['name' => '[Laptop] Loại laptop']);

        $laptop->attributes()->attach([
            $brandAttribute->id => ['value' => 'HP'],
            $typeAttribute->id => ['value' => 'Office'],
        ]);

        // Act
        $response = $this->get("/laptops/Gaming/Dell/{$laptop->id}");

        // Assert
        $response->assertStatus(404);
    }

    /** @test */
    public function it_shows_gaming_laptops()
    {
        // Arrange
        $gamingLaptop = Laptop::factory()->create();
        $attribute = Attribute::factory()->create(['name' => '[Laptop] Loại laptop']);

        $gamingLaptop->attributes()->attach([
            $attribute->id => ['value' => 'Gaming'],
        ]);

        // Act
        $response = $this->get('/laptops/Gaming');

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('categories.gaming-laptops');
        $response->assertViewHas('gamingLaptops');
    }

    /** @test */
    public function it_shows_office_laptops()
    {
        // Arrange
        $officeLaptop = Laptop::factory()->create();
        $attribute = Attribute::factory()->create(['name' => '[Laptop] Loại laptop']);

        $officeLaptop->attributes()->attach([
            $attribute->id => ['value' => 'Office'],
        ]);

        // Act
        $response = $this->get('/laptops/Office');

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('categories.office-laptops');
        $response->assertViewHas('officeLaptops');
    }


}
