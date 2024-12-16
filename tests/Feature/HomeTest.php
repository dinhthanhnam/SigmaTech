<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_home_should_show(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_home_should_have_variables(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertViewHas('top5FlashSaleItems');
        $response->assertViewHas('slides');
        $response->assertViewHas('gamingLaptops');
        $response->assertViewHas('officeLaptops');
        $response->assertViewHas('cpus');
    }
    public function test_home_should_have_variables_with_correct_number_count(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $data = $response->original->getData();

        $top5FlashSaleItems = $data['top5FlashSaleItems'];
        $gamingLaptops = $data['gamingLaptops'];
        $officeLaptops = $data['officeLaptops'];
        $cpus = $data['cpus'];

        // Kiểm tra rằng số lượng của top5FlashSaleItems nhỏ hơn hoặc bằng 5
        $this->assertLessThanOrEqual(5, $top5FlashSaleItems->count());
        $this->assertLessThanOrEqual(10, $gamingLaptops->count());
        $this->assertLessThanOrEqual(10, $officeLaptops->count());
        $this->assertLessThanOrEqual(10, $cpus->count());
    }
    public function test_home_should_have_slides(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $data = $response->original->getData();
        $this->assertArrayHasKey('slides', $data);
        $slides = $data['slides'];
        // Kiểm tra $slides không null
        $this->assertNotNull($slides);
        // Kiểm tra $slides không rỗng
        $this->assertNotEmpty($slides);
        // Kiểm tra $slides là một mảng hoặc collection
        $this->assertIsIterable($slides);

    }
    public function test_home_should_have_urls_to_correct_categories(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $data = $response->original->getData();
        $response->assertSee(route('gaming-laptops.show'));
        $response->assertSee(route('office-laptops.show'));
        $response->assertSee(route('cpus.show'));
    }

}
