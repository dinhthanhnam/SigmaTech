<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use App\Models\Laptop;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class AdminProductIntegrationTest extends TestCase
{
    use RefreshDatabase;
    public function test_show_all_products()
    {
        // Đảm bảo có người dùng đã đăng nhập với quyền admin
        $admin = User::first();

        $this->actingAs($admin);

        // Gửi request GET đến trang sản phẩm
        $response = $this->get(route('admin.show-product'));

        // Kiểm tra trạng thái HTTP 200 (OK)
        $response->assertStatus(200);

        // Kiểm tra các sản phẩm hiển thị trong view
        $response->assertSee('Danh sách sản phẩm'); // Kiểm tra một từ khóa trong sản phẩm
        $response->assertSee('Asus');   // Kiểm tra một tên thương hiệu
        $response->assertSee('Laptop Gaming - Đồ Hoạ');    // Kiểm tra loại sản phẩm
    }

    public function test_add_product_success()
    {
        $admin = User::first();

        $this->actingAs($admin);
        $data = [
            'name' => 'Laptop ABC',
            'brand' => 'Asus',
            'laptop_loai_laptop' => 'Gaming',
            'price' => 15000000,
            'deal_price' => 12000000,
            'rating' => 5,
            'sale_price' => 13000000,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg'),
            // Thêm các thuộc tính khác vào đây
        ];
    
        // Gửi request POST để thêm sản phẩm mới
        $response = $this->post('/admin/new-product/laptops', $data);
    
        // Kiểm tra phản hồi từ server
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Thêm sản phẩm thành công',
        ]);
        $laptopId = DB::table('laptops')->where('name', 'Laptop ABC')->value('id');

        // Kiểm tra sản phẩm đã được thêm vào DB
        $this->assertDatabaseHas('laptops', [
            'id' => $laptopId,
            'name' => 'Laptop ABC',
            'category_id' => 1,
        ]);
        $this->assertDatabaseHas('laptop_attribute', [
            'laptop_id' => $laptopId, // Kiểm tra laptop attribute
        ]);
    }
    
    public function test_update_product_success()
    {
        // Đăng nhập với tài khoản admin
        $admin = User::first(); // Hoặc bạn có thể tạo user admin trong test
        $this->actingAs($admin);

        // Tạo sản phẩm trước khi sửa (sử dụng factory hoặc thêm trực tiếp vào cơ sở dữ liệu)
        $laptop = Laptop::first();

        // Dữ liệu mới để cập nhật sản phẩm
        $updatedData = [
            'name' => 'Laptop ABC',  // Đổi tên sản phẩm
            // Thêm các thuộc tính bạn muốn thay đổi ở đây
            'price' => 16000000,
            'deal_price' => 14000000,
        ];

        // Gửi request PUT để sửa sản phẩm
        $response = $this->postJson('/admin/product/laptops/' . $laptop->id, $updatedData);

        // Kiểm tra phản hồi từ server
        $response->assertStatus(200);  // Kiểm tra xem có trả về status 200 không
        $response->assertJson([
            'success' => true,
            'message' => 'Cập nhật sản phẩm thành công',
        ]);

        // Kiểm tra rằng sản phẩm đã được cập nhật trong cơ sở dữ liệu
        $this->assertDatabaseHas('laptops', [
            'id' => $laptop->id,  // Kiểm tra id của sản phẩm
            'name' => 'Laptop ABC',  // Kiểm tra tên sản phẩm đã được thay đổi
        ]);

        // Nếu bạn có các thuộc tính cần sửa, bạn cũng có thể kiểm tra ở đây
        // Ví dụ kiểm tra lại các thuộc tính của sản phẩm
        $this->assertDatabaseHas('laptop_attribute', [
            'laptop_id' => $laptop->id,
            'attribute_id' => 3, // Ví dụ kiểm tra thuộc tính 'Brand'
            'value' => '16000000',
        ]);
        $this->assertDatabaseHas('laptop_attribute', [
            'laptop_id' => $laptop->id,
            'attribute_id' => 5, // Ví dụ kiểm tra thuộc tính 'Brand'
            'value' => '14000000',
        ]);
    }
    public function test_delete_product_success()
    {
        $admin = User::first(); // Hoặc bạn có thể tạo user admin trong test
        $this->actingAs($admin);
        $laptop = Laptop::first();
    
        // Gửi yêu cầu DELETE để xóa sản phẩm
        $response = $this->deleteJson('/delete-product/laptops/' . $laptop->id);
    
        // Kiểm tra phản hồi trả về
        $response->assertStatus(200);
        $response->assertJson([
            'success' => 'Xoa thanh cong san pham',
        ]);
    
        // Kiểm tra sản phẩm đã được soft delete (kiểm tra có thời gian xóa không)
        $this->assertSoftDeleted('laptops', [
            'id' => $laptop->id,
        ]);
    }
    
    public function test_delete_product_not_found()
    {
        $nonExistentId = 9999;
    
        // Đăng nhập với tài khoản admin
        $admin = User::first();
        $this->actingAs($admin);
    
        // Gửi yêu cầu DELETE để xóa sản phẩm không tồn tại
        $response = $this->deleteJson('/delete-product/laptops/' . $nonExistentId);
    
        // Kiểm tra phản hồi trả về khi sản phẩm không tồn tại
        $response->assertStatus(404);
        $response->assertJson([
            'error' => 'Khong tim thay san pham',
        ]);
    }
    
    public function test_search_product_success()
    {
        // Tạo một số sản phẩm để tìm kiếm
        $laptop1 = Laptop::factory()->create([
            'name' => 'Laptop XYZ',
            'category_id' => 1,
        ]);
    
        $laptop2 = Laptop::factory()->create([
            'name' => 'Laptop ABC',
            'category_id' => 1,
        ]);
    
        // Đăng nhập với tài khoản admin
        $admin = User::first();
        $this->actingAs($admin);
    
        // Gửi yêu cầu tìm kiếm với từ khóa "Laptop XYZ"
        $response = $this->getJson('/search-products?search=Laptop XYZ');
    
        // Kiểm tra phản hồi trả về
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'name' => 'Laptop XYZ',
        ]);
        $response->assertJsonMissing([
            'name' => 'Laptop ABC',
        ]);
    }
    
    public function test_search_product_no_results()
    {
        // Đăng nhập với tài khoản admin
        $admin = User::first();
        $this->actingAs($admin);
    
        // Gửi yêu cầu tìm kiếm với từ khóa không có sản phẩm nào khớp
        $response = $this->getJson('/search-products?search=NonExistentProduct');
    
        // Kiểm tra phản hồi trả về
        $response->assertStatus(200);
        $response->assertJson([
            'products' => [],
        ]);
    }
    
}
