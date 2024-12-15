<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_register_form_should_show(): void
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('/register');
    }

    public function test_login_form_should_show(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('/login');
    }
    public function test_unauthenticated_user_shouldnt_see_account_dashboard(): void
    {
        $response = $this->get('/account');
        $response->assertStatus(302);
    }

    public function test_authenticated_user_should_see_account_dashboard(): void
    {
        $user = User::factory()->create();
        $response = $this->get('/account');
        $this->actingAs($user);
        $response = $this->get('/account');
        $response->assertSee('/account');
    }
}
