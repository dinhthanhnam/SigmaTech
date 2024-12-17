<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\CartItem;
use App\Models\Laptop;

class CartIntegrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_cart_is_empty(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    
        // Gửi yêu cầu đến route hiển thị giỏ hàng
        $response = $this->get(route('cart'));

        $response->assertStatus(200);
        $response->assertSee(__('Giỏ hàng trống'));
    }
    public function test_cart_displays_products()
    {

        $product = Laptop::first();
        $user = User::factory()->create();
        $this->actingAs($user);

        CartItem::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'product_type' => 'laptop',
            'quantity' => 1,
            'name' => $product->name,
        ]);

        // Gửi yêu cầu đến route hiển thị giỏ hàng
        $response = $this->get(route('cart'));

        // Kiểm tra trạng thái HTTP
        $response->assertStatus(200);

        // Kiểm tra xem sản phẩm có hiển thị trên giao diện hay không
        $response->assertSee($product->name);
        $response->assertSee($product->price); // Nếu bạn hiển thị giá
    }


    public function test_add_product_to_cart()
    {
        // Tạo một user để mô phỏng đăng nhập
        $user = User::factory()->create();

        // Tạo một sản phẩm (ví dụ: laptop)
        $laptop = Laptop::factory()->create([
            'name' => 'Test Laptop',
        ]);

        // Mô phỏng dữ liệu gửi qua request
        $postData = [
            'product_id' => $laptop->id,
            'product_type' => 'laptop',
            'quantity' => 1,
            'product_name' => $laptop->name,
        ];

        // Mô phỏng người dùng đăng nhập
        $this->actingAs($user);

        // Gửi request POST để thêm sản phẩm vào giỏ hàng
        $response = $this->post(route('cart.add'), $postData);

        // Kiểm tra xem request trả về thành công
        $response->assertRedirect();

        // Kiểm tra dữ liệu trong cơ sở dữ liệu
        $this->assertDatabaseHas('cart_items', [
            'user_id' => $user->id,
            'product_id' => $laptop->id,
            'product_type' => 'laptop',
            'quantity' => 1,
            'name' => 'Test Laptop',
        ]);
    }
    public function test_add_same_product_to_cart_increases_quantity()
    {
        // Tạo một user và đăng nhập
        $user = User::factory()->create();

        // Tạo một sản phẩm (laptop)
        $laptop = Laptop::factory()->create();

        // Tạo sẵn sản phẩm trong giỏ hàng
        CartItem::create([
            'user_id' => $user->id,
            'product_id' => $laptop->id,
            'product_type' => 'laptop',
            'quantity' => 1,
            'name' => $laptop->name,
        ]);

        // Mô phỏng dữ liệu gửi qua request
        $postData = [
            'product_id' => $laptop->id,
            'product_type' => 'laptop',
            'quantity' => 1,
            'product_name' => $laptop->name,
        ];

        // Mô phỏng người dùng đăng nhập
        $this->actingAs($user);

        // Gửi request POST để thêm sản phẩm vào giỏ hàng
        $response = $this->post(route('cart.add'), $postData);

        // Kiểm tra request trả về thành công
        $response->assertRedirect();

        // Kiểm tra xem số lượng đã được tăng lên
        $this->assertDatabaseHas('cart_items', [
            'user_id' => $user->id,
            'product_id' => $laptop->id,
            'product_type' => 'laptop',
            'quantity' => 2, // Đã tăng lên
        ]);
    }

    public function test_remove_product_from_cart()
    {
        // Giả lập người dùng và sản phẩm trong giỏ hàng
        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Laptop::first();
        $cartItem = CartItem::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'product_type' => 'laptop',
            'quantity' => 1,
            'name' => $product->name,
        ]);
        $this->assertDatabaseHas('cart_items', ['id' => $cartItem->id]);

        // Gửi yêu cầu xóa sản phẩm
        $response = $this->delete(route('cart.remove', ['product_type' => 'laptop', 'product_id' => $product->id]));

        // Kiểm tra trạng thái HTTP
        $response->assertStatus(200);
        $this->assertDatabaseHas('cart_items', [
            'id' => $cartItem->id,
            'deleted_at' => now(),  // Kiểm tra trường deleted_at có giá trị (đã bị xóa mềm)
        ]);

        // Kiểm tra phản hồi JSON trả về
        $response->assertJson(['success' => 'Sản phẩm đã được xóa khỏi giỏ hàng']);
    }
    public function test_buynow()
    {
        // Tạo một người dùng và đăng nhập
        $user = User::factory()->create();
        $this->actingAs($user);
    
        // Tạo một sản phẩm (Giả sử bạn có một sản phẩm trong bảng laptop)
        $product = Laptop::first();  // Sử dụng factory để tạo một laptop
    
        // Gửi yêu cầu "mua ngay" với thông tin sản phẩm
        $response = $this->post(route('buynow'), [
            'product_id' => $product->id,
            'product_type' => 'laptop',
            'quantity' => 1,
            'product_name' => $product->name,
        ]);
    
        // Kiểm tra trạng thái HTTP là 302 (redirect đến giỏ hàng)
        $response->assertStatus(302);
    
        // Kiểm tra rằng sản phẩm đã được thêm vào giỏ hàng (hoặc số lượng đã được cập nhật)
        $this->assertDatabaseHas('cart_items', [
            'user_id' => $user->id,
            'product_id' => $product->id,
            'product_type' => 'laptop',
            'quantity' => 1,
            'name' => $product->name,
        ]);
    }
    
    public function test_buynow_update_product_quantity_in_cart()
    {
        // Tạo một người dùng và đăng nhập
        $user = User::factory()->create();
        $this->actingAs($user);
    
        // Tạo một sản phẩm (Giả sử bạn có một sản phẩm trong bảng laptop)
        $product = Laptop::first();  // Sử dụng factory để tạo một laptop
    
        // Thêm sản phẩm vào giỏ hàng (với số lượng 1)
        CartItem::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'product_type' => 'laptop',
            'quantity' => 3,
            'name' => $product->name,
        ]);
    
        // Gửi yêu cầu "mua ngay" với số lượng mới
        $response = $this->post(route('buynow'), [
            'product_id' => $product->id,
            'product_type' => 'laptop',
            'quantity' => 1,
            'product_name' => $product->name,
        ]);
    
        // Kiểm tra trạng thái HTTP là 302 (redirect đến giỏ hàng)
        $response->assertStatus(302);
    
        // Kiểm tra rằng số lượng sản phẩm đã được cập nhật trong giỏ hàng
        $this->assertDatabaseHas('cart_items', [
            'user_id' => $user->id,
            'product_id' => $product->id,
            'product_type' => 'laptop',
            'quantity' => 4, // Số lượng sau khi cập nhật
            'name' => $product->name,
        ]);
    }
    
}
