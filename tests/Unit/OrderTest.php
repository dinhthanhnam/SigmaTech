<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_an_order()
    {
        $orderData = [
            'user_id' => 1, // Set user_id explicitly in another test if needed
            'customer_name' => 'John Doe',
            'gender' => 'Male',
            'phone_number' => '1234567890',
            'shipping_address' => '123 Street, City',
            'payment_method' => 'cod',
            'note' => 'Leave at door',
            'total_price' => 500000,
        ];

        $order = Order::create($orderData);

        $this->assertDatabaseHas('orders', $orderData);
    }

    /** @test */
    public function an_order_can_have_many_order_details()
    {
        $order = Order::create([
            'user_id' => 2,
            'customer_name' => 'Jane Smith',
            'gender' => 'Female',
            'phone_number' => '0987654321',
            'shipping_address' => '456 Avenue, City',
            'payment_method' => 'cod',
            'note' => 'Call before delivery',
            'total_price' => 3000000,
        ]);

        $orderDetail1 = OrderDetail::create([
            'order_id' => $order->id,
            'product_type' => 'laptop',
            'product_id' => 1,
            'quantity' => 2,
            'price' => 150
        ]);

        $orderDetail2 = OrderDetail::create([
            'order_id' => $order->id,
            'product_type' => 'laptop',
            'product_id' => 2,
            'quantity' => 1,
            'price' => 300
        ]);

        $this->assertEquals(2, $order->orderDetails()->count());
        $this->assertTrue($order->orderDetails->contains($orderDetail1));
        $this->assertTrue($order->orderDetails->contains($orderDetail2));
    }

    /** @test */
    public function an_order_belongs_to_a_user()
    {
        $user = User::create([
            'name' => 'Alice Johnson',
            'email' => 'alice@example.com',
            'password' => bcrypt('password')
        ]);

        $order = Order::create([
            'user_id' => $user->id,
            'customer_name' => 'Alice Johnson',
            'gender' => 'Female',
            'phone_number' => '1122334455',
            'shipping_address' => '789 Boulevard, City',
            'payment_method' => 'cod',
            'note' => 'Fragile items',
            'total_price' => 750000,
        ]);

        $this->assertEquals($user->id, $order->user->id);
    }
}