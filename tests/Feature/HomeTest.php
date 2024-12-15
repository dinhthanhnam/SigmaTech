<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_home_should_show(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewHas('top5FlashSaleItems');
    }
}
