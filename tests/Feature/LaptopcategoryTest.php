<?php

namespace Tests\Feature;

use App\Models\Attribute;
use Tests\TestCase;
use App\Models\Laptop;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LaptopcategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_loads_the_gaming_laptops_page_successfully()
    {
        // 1. Tạo dữ liệu giả cho Laptop với các attributes.
        $laptop = Laptop::factory()->create([
            'name' => 'Predator Helios 300',
            'category_id' => 1, // Giả sử category_id = 1
        ]);

        // Tạo các thuộc tính (attributes) giả lập
        $attributes = Attribute::factory()->createMany([
            ['name' => '[Laptop] Loại laptop'],
            ['name' => 'Brand'],
            ['name' => 'Price'],
            ['name' => 'Deal Price'],
            ['name' => 'On Top'],
        ]);

        // Gắn các attributes vào laptop với các giá trị tương ứng
        $laptop->attributes()->attach([
            $attributes->firstWhere('name', '[Laptop] Loại laptop')->id => ['value' => 'Gaming'],
            $attributes->firstWhere('name', 'Brand')->id => ['value' => 'Acer'],
            $attributes->firstWhere('name', 'Price')->id => ['value' => 40990000],
            $attributes->firstWhere('name', 'Deal Price')->id => ['value' => 40990000],
            $attributes->firstWhere('name', 'On Top')->id => ['value' => 1],
        ]);

        // 2. Gửi request GET đến route.
        $response = $this->get('/laptops/Gaming');

        // 3. Kiểm tra route trả về 200 OK.
        $response->assertStatus(200);

        // 4. Kiểm tra dữ liệu trả về từ controller.
        $response->assertViewHas('gamingLaptops');
        $response->assertViewHas('topGamingLaptops');

        // 5. Kiểm tra nội dung hiển thị trên view.
        $response->assertSee('Acer');
        $response->assertSee(number_format(intval(40990000), 0, ',', '.'));
    }
}