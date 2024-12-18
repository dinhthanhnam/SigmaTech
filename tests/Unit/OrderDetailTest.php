<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderDetailTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_an_order_detail()
    {
        $order = Order::create([
            'user_id' => 1,
            'customer_name' => 'Tom Cruise',
            'gender' => 'Male',
            'phone_number' => '5556667777',
            'shipping_address' => '1010 Hollywood Blvd',
            'payment_method' => 'cod',
            'note' => 'Leave with concierge',
            'total_price' => 200.00,
        ]);

        $orderDetailData = [
            'order_id' => $order->id,
            'product_type' => 'laptop',
            'product_id' => 3,
            'quantity' => 5,
            'price' => 20.00
        ];

        $orderDetail = OrderDetail::create($orderDetailData);

        $this->assertDatabaseHas('order_details', $orderDetailData);
    }

    /** @test */
    public function an_order_detail_belongs_to_an_order()
    {
        $order = Order::create([
            'user_id' => 2,
            'customer_name' => 'Emma Watson',
            'gender' => 'Female',
            'phone_number' => '4445556666',
            'shipping_address' => '2020 Sunset Blvd',
            'payment_method' => 'cod',
            'note' => 'Signature required',
            'total_price' => 450.00,  
        ]);

        $orderDetail = OrderDetail::create([
            'order_id' => $order->id,
            'product_type' => 'laptop',
            'product_id' => 4,
            'quantity' => 3,
            'price' => 150.00
        ]);

        $this->assertEquals($order->id, $orderDetail->order->id);
    }
}