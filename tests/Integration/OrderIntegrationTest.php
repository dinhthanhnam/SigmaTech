<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\CartItem;
use App\Models\Laptop;


class OrderIntegrationTest extends TestCase
{
    use RefreshDatabase;
    public function test_order_info_shows_correct_cart_items()
    {
        // Tạo một người dùng và đăng nhập
        $user = User::factory()->create();
        $this->actingAs($user);

        // Tạo sản phẩm giả và thêm vào giỏ hàng
        $laptop = Laptop::first();
        $cartItem = CartItem::create([
            'user_id' => $user->id,
            'product_id' => $laptop->id,
            'product_type' => 'laptop',
            'quantity' => 1,
            'name' => $laptop->name,
        ]);

        // Gửi yêu cầu xem thông tin đơn hàng
        $response = $this->get(route('order.info', ['items' => json_encode([[
            'productType' => 'laptop',
            'productId' => $laptop->id
        ]])]));

        // Kiểm tra kết quả trả về
        $response->assertStatus(200);
        $response->assertViewHas('cartItems');
        $this->assertEquals(1, count(session('cartItems')));
    }
    public function test_place_order_success()
    {
        // Tạo người dùng và đăng nhập
        $user = User::factory()->create();
        $this->actingAs($user);

        // Tạo sản phẩm giả và thêm vào giỏ hàng
        $laptop = Laptop::first();
        CartItem::create([
            'user_id' => $user->id,
            'product_id' => $laptop->id,
            'product_type' => 'laptop',
            'quantity' => 1,
            'name' => $laptop->name,
        ]);

        // Thực hiện đặt hàng (COD)
        $orderData = [
            'fullname' => 'Nguyen Duy Hung',
            'gender' => 'Male',
            'phone' => '0986435177',
            'address' => '123 Main St',
            'payment_method' => 'cod',
            'totalPrice' => 1000000,
            'note' => 'Giao hàng nhanh',
        ];

        $response = $this->post(route('order.place'), $orderData);

        // Kiểm tra rằng người dùng được chuyển hướng đúng (đến trang tài khoản)
        $response->assertRedirect(route('user-account'));
        $response->assertSessionHas('orderSuccess', true);

        // Kiểm tra rằng đơn hàng đã được lưu vào cơ sở dữ liệu
        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'payment_method' => 'cod',
            'total_price' => 1000000,
        ]);
    }

    public function test_place_order_banking_success()
    {
        // Tạo người dùng và đăng nhập
        $user = User::factory()->create();
        $this->actingAs($user);

        // Tạo sản phẩm giả và thêm vào giỏ hàng
        $laptop = Laptop::factory()->create();
        CartItem::create([
            'user_id' => $user->id,
            'product_id' => $laptop->id,
            'product_type' => 'laptop',
            'quantity' => 1,
            'name' => $laptop->name,
        ]);

        // Thực hiện đặt hàng (Banking)
        $orderData = [
            'fullname' => 'Nguyen Duy Hung',
            'gender' => 'Male',
            'phone' => '0986435177',
            'address' => '123 Main St',
            'payment_method' => 'banking',
            'totalPrice' => 1000000, // giá trị thanh toán
            'note' => 'Thanh toán qua ngân hàng',
        ];

        $response = $this->post(route('order.place'), $orderData);

        // Kiểm tra rằng đơn hàng đã được lưu và người dùng được chuyển hướng đến trang thanh toán ngân hàng
        $response->assertViewIs('banking');
        $response->assertViewHas('qrUrl');

        // Kiểm tra rằng đơn hàng đã được lưu vào cơ sở dữ liệu
        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'payment_method' => 'banking',
            'total_price' => 1000000,
        ]);
    }
}
