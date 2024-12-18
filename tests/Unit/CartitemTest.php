<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\CartItem;
use App\Models\User;

class CartItemTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_cart_item()
    {
        $cartItemData = [
            'user_id' => 1, // Ensure user with ID 1 exists in another test or seed the database
            'product_type' => 'laptop',
            'product_id' => 101,
            'name' => 'Smartphone',
            'quantity' => 2,
        ];

        $cartItem = CartItem::create($cartItemData);

        $this->assertDatabaseHas('cart_items', $cartItemData);
    }

    /** @test */
    public function it_belongs_to_a_user()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
        ]);

        $cartItem = CartItem::create([
            'user_id' => $user->id,
            'product_type' => 'laptop',
            'product_id' => 202,
            'name' => 'Book Title',
            'quantity' => 3,
        ]);

        $this->assertEquals($user->id, $cartItem->user_id);
    }

}