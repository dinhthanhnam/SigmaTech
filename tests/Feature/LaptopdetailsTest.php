<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Laptop;
use App\Models\Attribute;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LaptopdetailsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Kiểm thử hiển thị đúng thông tin sản phẩm
     * 
     * @test
     */
    public function it_displays_correct_product_details()
    {
        // Tạo một laptop giả lập
        $laptop = Laptop::factory()->create([
            'name' => 'Predator Helios 300',
            'category_id' => 1, // Giả sử category_id = 1
        ]);

        // Tạo các thuộc tính (attributes) giả lập
        $attributes = Attribute::factory()->createMany([
            ['name' => '[Laptop] Loại laptop'],
            ['name' => 'Brand'],
            ['name' => 'Price'],
        ]);

        // Gắn các attributes vào laptop với các giá trị tương ứng
        $laptop->attributes()->attach([
            $attributes->firstWhere('name', '[Laptop] Loại laptop')->id => ['value' => 'Gaming'],
            $attributes->firstWhere('name', 'Brand')->id => ['value' => 'Acer'],
            $attributes->firstWhere('name', 'Price')->id => ['value' => 40990000],
        ]);

        // Gửi request đến URL
        $type = 'Gaming';
        $brand = 'Acer';
        $id = $laptop->id;
        $response = $this->get("/laptops/{$type}/{$brand}/{$id}");

        // Kiểm tra trạng thái HTTP
        $response->assertStatus(200);

        // Kiểm tra nội dung hiển thị trong view
        $response->assertSee($laptop->name);
        $response->assertSee('Gaming');
        $response->assertSee('Acer');
        $response->assertSee(number_format(intval(40990000), 0, ',', '.'));
        
    }

    /**
     * Kiểm thử trả về 404 khi sản phẩm không tồn tại
     * 
     * @test
     */
    public function it_shows_404_if_product_does_not_exist()
    {
        $response = $this->get('/laptops/Gaming/Acer/99999'); // Sử dụng ID không tồn tại
        $response->assertStatus(404); // Kiểm tra trả về mã lỗi 404
    }

    /**
     * Kiểm thử không hiển thị sản phẩm nếu thông tin không khớp
     * 
     * @test
     */
    public function it_shows_404_if_product_attributes_do_not_match()
    {
        // Tạo một laptop giả lập
        $laptop = Laptop::factory()->create([
            'name' => 'Predator Helios 300',
            'category_id' => 1,
        ]);

        // Tạo các thuộc tính (attributes) giả lập
        $attributes = Attribute::factory()->createMany([
            ['name' => '[Laptop] Loại laptop'],
            ['name' => 'Brand'],
        ]);

        // Gắn các attributes vào laptop nhưng với giá trị không khớp
        $laptop->attributes()->attach([
            $attributes->firstWhere('name', '[Laptop] Loại laptop')->id => ['value' => 'Ultrabook'],
            $attributes->firstWhere('name', 'Brand')->id => ['value' => 'Dell'],
        ]);

        // Gửi request đến URL với thông tin không khớp
        $response = $this->get("/laptops/Gaming/Acer/{$laptop->id}");
        $response->assertStatus(404); // Kiểm tra trả về mã lỗi 404
    }
}
