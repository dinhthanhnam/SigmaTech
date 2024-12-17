<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FlashSaleTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_flash_sale_page_shows(): void
    {
        $response = $this->get('/flash-sale');

        $response->assertStatus(200);
    }

    public function test_flash_sale_should_have_variable(): void
    {
        $response = $this->get('/flash-sale');

        $response->assertViewHas('flashSaleItems');
    }
}
