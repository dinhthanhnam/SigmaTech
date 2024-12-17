<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Order;
use App\Models\User;

class AdminOrderIntegrationTest extends TestCase
{
    use RefreshDatabase;
    public function test_show_all_orders()
    {

        // Đăng nhập với tài khoản admin
        $admin = User::first();
        $this->actingAs($admin);

        // Gửi yêu cầu GET để lấy tất cả các đơn hàng
        $response = $this->getJson('/admin/order');

        // Kiểm tra phản hồi trả về
        $response->assertStatus(200);
        $response->assertSee('Danh sách đơn hàng');  

    }
    public function test_update_order()
    {
        // Tạo một đơn hàng giả để cập nhật
        $order = Order::first();
    
        // Đăng nhập với tài khoản admin
        $admin = User::first();
        $this->actingAs($admin);
    
        // Dữ liệu mới để cập nhật
        $data = [
            'customer_name' => 'Nguyễn Văn A',
            'phone_number' => '0123456789',
            'shipping_address' => '123 Đường ABC',
            'payment_method' => 'banking',
            'note' => 'Giao hàng nhanh',
            'status' => '2',
        ];
    
        // Gửi yêu cầu POST để cập nhật thông tin đơn hàng
        $response = $this->postJson("/admin/order/{$order->id}", $data);
    
        // Kiểm tra phản hồi trả về
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Đơn hàng đã được cập nhật',
        ]);
    
        // Kiểm tra rằng thông tin đơn hàng đã được cập nhật trong cơ sở dữ liệu
        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'customer_name' => 'Nguyễn Văn A',
            'phone_number' => '0123456789',
            'shipping_address' => '123 Đường ABC',
            'payment_method' => 'banking',
            'note' => 'Giao hàng nhanh',
            'status' => '2',
        ]);
    }
    
}
