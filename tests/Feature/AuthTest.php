<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
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

    public function test_unauthenticated_user_shouldnt_see_admin_dashboard(): void
    {
        $response = $this->get('/admin');
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

    public function test_allows_user_to_login_with_valid_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'test1@example.com',
            'password' => 'password123',
        ]);
        // Gửi POST request để đăng nhập
        $response = $this->post('/login', [
            'email' => 'test1@example.com',
            'password' => 'password123',
        ]);

        // Kiểm tra HTTP status là 302 (redirect)
        $response->assertStatus(302);

        // Kiểm tra user được xác thực
        $this->assertAuthenticatedAs($user);

        // Kiểm tra chuyển hướng về trang chính
        $response->assertRedirect('/');
    }
}
