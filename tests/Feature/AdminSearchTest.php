<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminSearchTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_admin_search_works_with_json(): void
    {
        $user = User::factory()->create(['utype' => 'ADM']);
        $this->actingAs($user);
        //tim kiem voi tu khoa "ROG"
        $response = $this->get("/search-products?search=ROG/");

        $response->assertStatus(200);

        // Lấy dữ liệu JSON từ response
        $data = $response->json(); // Trả về toàn bộ JSON
        $searchproducts = $data['products'];

        // Kiểm tra dữ liệu có đúng định dạng không
        $this->assertIsArray($searchproducts);
        $this->assertNotEmpty($searchproducts);

        // Có thể kiểm tra một phần của mảng nếu cần
        foreach ($searchproducts as $product) {
            $this->assertArrayHasKey('name', $product);
            $this->assertStringContainsString('ROG', $product['name']);
        }
    }
}
