<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\CartItem;
use App\Models\Laptop;
use App\Models\Order;
use App\Models\OrderDetail;


class OrderTest extends TestCase
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
    public function test_returns_404_if_order_does_not_exist()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->getJson('/account/order/9999');

        $response->assertStatus(404);
        $response->assertJson(['error' => 'Order not found']);
    }
    public function test_order_details_if_order_exists()
    {
        $user = User::first(); // Giả sử bạn có user_id = 1 trong seed
        $this->actingAs($user);
        $order = Order::where('user_id', $user->id)->first();

        // Kiểm tra xem Order tồn tại
        $this->assertNotNull($order, "Seeded database does not contain any orders for the user!");

        // Gửi request lấy thông tin OrderDetails
        $response = $this->getJson('/account/order/' . $order->id);

        // Lấy các order details đã seed trong DB
        $orderDetails = OrderDetail::where('order_id', $order->id)->get();

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'customer_name',
            'phone_number',
            'shipping_address',
            'payment_method',
            'note',
            'total_price',
            'status',
            'order_details' => [
                '*' => ['image', 'name', 'quantity', 'price']
            ],
        ]);

        // Kiểm tra dữ liệu trả về (dựa trên dữ liệu seed)
        $responseData = $response->json();
        $this->assertEquals($order->id, $responseData['id']);
        $this->assertEquals($order->customer_name, $responseData['customer_name']);
        $this->assertCount($orderDetails->count(), $responseData['order_details']);
    }   

}
