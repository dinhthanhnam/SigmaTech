<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Laptop;
use App\Models\User;
use App\Models\Attribute;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AdminFlashsaleIntegrationTest extends TestCase
{
    use RefreshDatabase;
    public function test_update_sale_success()
    {
        $product = Laptop::with('attributes')->first();
        $admin = User::first();

        $this->actingAs($admin);
        // Dữ liệu gửi cập nhật
        $data = [
            'sale_price' => 1000000,
            'sale_end_date' => '2025-12-31',
        ];

        // Gửi yêu cầu POST cập nhật sản phẩm sale
        $response = $this->postJson("/admin/new-flashsale/laptops/{$product->id}", $data);

        // Kiểm tra phản hồi
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Cập nhật sản phẩm thành công',
        ]);

        // Kiểm tra giá trị cập nhật trong cơ sở dữ liệu
        foreach ($data as $key => $value) {
            $attributeName = str_replace('_', ' ', ucfirst($key)); // Chuyển đổi lại thành tên gốc
            $this->assertDatabaseHas('laptop_attribute', [
                'attribute_id' => Attribute::where('name', $attributeName)->first()->id,
                'value' => $value,
                'laptop_id' => $product->id,
            ]);
        }
    }



}
