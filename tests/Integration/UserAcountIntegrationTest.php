<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Laptop;

class UserAcountIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_their_orders()
    {
        // Lấy user đầu tiên từ cơ sở dữ liệu
        $user = User::skip(1)->first();

        // Lấy các đơn hàng của user này
        $orders = Order::where('user_id', $user->id)->get();

        // Đảm bảo có ít nhất 1 đơn hàng để kiểm tra
        $this->assertNotEmpty($orders);

        // Đăng nhập user
        $this->actingAs($user);

        // Gửi yêu cầu đến route 'user-account'
        $response = $this->get(route('user-account'));

        // Kiểm tra trạng thái phản hồi
        $response->assertStatus(200);

        // Kiểm tra các đơn hàng hiển thị trong view
        $response->assertViewHas('orders', function ($viewOrders) use ($user) {
            return $viewOrders->where('user_id', $user->id)->count() === Order::where('user_id', $user->id)->count();
        });

        // Kiểm tra nội dung HTML có chứa thông tin của đơn hàng
        foreach ($orders as $order) {
            $response->assertSee($order->status);
        }
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
        $user = User::skip(1)->first();
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

    public function test_user_can_update_their_account_info()
    {
        // Lấy user đầu tiên từ cơ sở dữ liệu
        $user = User::firstOrFail();

        // Đăng nhập user
        $this->actingAs($user);

        // Dữ liệu mới để cập nhật
        $newData = [
            'name' => 'Updated Name',
            'gender' => 'female', // Nữ
            'phone' => '0987654321',
            'address' => 'Updated Address',
        ];

        // Gửi POST request để cập nhật thông tin
        $response = $this->post('/account/update', $newData);

        // Kiểm tra trạng thái phản hồi
        $response->assertStatus(200);

        // Kiểm tra JSON trả về
        $response->assertJson(['message' => 'Thông tin đã được cập nhật thành công!']);

        // Lấy lại user từ database để kiểm tra
        $updatedUser = $user->fresh();

        $this->assertEquals('Updated Name', $updatedUser->name);
        $this->assertEquals(0, $updatedUser->gender); // 'female' được chuyển thành 0
        $this->assertEquals('0987654321', $updatedUser->phone);
        $this->assertEquals('Updated Address', $updatedUser->address);
    }
}
