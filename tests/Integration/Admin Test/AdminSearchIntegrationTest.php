<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Laptop;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminSearchIntegrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test tìm kiếm sản phẩm cho admin với từ khóa cụ thể.
     */
    public function test_admin_can_search_products(): void
    {
        // Tạo tài khoản admin
        $admin = User::factory()->create(['utype' => 'ADM']);

        // Giả lập một số sản phẩm trong cơ sở dữ liệu
        Laptop::factory()->create(['name' => 'ASUS ROG Gaming Laptop']);
        Laptop::factory()->create(['name' => 'ROG Mouse']);
        Laptop::factory()->create(['name' => 'Dell Office Laptop']);
        Laptop::factory()->create(['name' => 'ROG Keyboard']);

        // Đăng nhập với tài khoản admin
        $this->actingAs($admin);

        // Gửi request tìm kiếm với từ khóa "ROG"
        $response = $this->get('/search-products?search=ROG');

        // Đảm bảo response trả về thành công
        $response->assertStatus(200);

        // Lấy dữ liệu JSON từ response
        $data = $response->json();

        // Kiểm tra 'products' có trong response JSON
        $this->assertArrayHasKey('products', $data);

        // Lấy danh sách sản phẩm trả về
        $searchLaptops = $data['products'];

        // Đảm bảo kết quả không rỗng
        $this->assertNotEmpty($searchLaptops);

        // Kiểm tra từng sản phẩm có chứa từ khóa "ROG"
        foreach ($searchLaptops as $product) {
            $this->assertArrayHasKey('name', $product);
            $this->assertStringContainsString('ROG', $product['name']);
        }
    }

    /**
     * Test admin tìm kiếm không có kết quả.
     */
    public function test_admin_search_returns_no_results(): void
    {
        // Tạo tài khoản admin
        $admin = User::factory()->create(['utype' => 'ADM']);

        // Giả lập sản phẩm không khớp từ khóa
        Laptop::factory()->create(['name' => 'Dell Office Laptop']);

        // Đăng nhập với tài khoản admin
        $this->actingAs($admin);

        // Gửi request tìm kiếm với từ khóa không tồn tại
        $response = $this->get('/search-products?search=Vanil');

        // Đảm bảo response trả về thành công
        $response->assertStatus(200);

        // Lấy dữ liệu JSON từ response
        $data = $response->json();

        // Đảm bảo 'products' có trong response JSON
        $this->assertArrayHasKey('products', $data);

        // Lấy danh sách sản phẩm trả về
        $searchLaptops = $data['products'];

        // Đảm bảo kết quả là rỗng
        $this->assertEmpty($searchLaptops);
    }

    /**
     * Test admin không có quyền sẽ bị chặn truy cập.
     */
    public function test_non_admin_cannot_access_search(): void
    {
        // Tạo tài khoản user không phải admin
        $user = User::factory()->create(['utype' => 'USR']);

        // Đăng nhập với tài khoản user
        $this->actingAs($user);

        // Gửi request tìm kiếm
        $response = $this->get('/search-products?search=ROG');

        // Đảm bảo user không có quyền truy cập
        $response->assertStatus(403); // Forbidden
    }

    /**
     * Test không đăng nhập sẽ redirect đến login.
     */
    public function test_guest_cannot_access_search(): void
    {
        // Gửi request tìm kiếm khi chưa đăng nhập
        $response = $this->get('/search-products?search=ROG');

        // Đảm bảo guest bị redirect đến trang login
        $response->assertRedirect('/login');
    }
}

