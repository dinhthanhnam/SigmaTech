<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_cart_contains_empty_prooduct(): void
    {
        $response = $this->get('/cart');

        $response->assertStatus(200);
        $response->assertSee(__('Giỏ hàng trống'));
    }
}
