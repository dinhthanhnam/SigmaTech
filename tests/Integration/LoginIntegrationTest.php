<?php

namespace Tests\Integration;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginIntegrationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_login_with_valid_credentials()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);
        // Gửi POST request để đăng nhập
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);
        $response->assertStatus(302);
        $this->assertAuthenticatedAs($user);
        $response->assertRedirect('/');
    }
    public function test_login_with_invalid_credentials()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);
        // Gửi POST request với mật khẩu không chính xác
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrongpassword',
        ]);
        $response->assertStatus(302);
        $response->assertSessionHas('error');
        $this->assertGuest();
    }
    public function test_login_with_normal_user()
    {
        $user = User::factory()->create([
            'email' => 'userabc@example.com',
            'password' => 'userabc',
        ]);
 
        $response = $this->post('/login', [
            'email' => 'userabc@example.com',
            'password' => 'userabc',
        ]);
        $this->assertAuthenticatedAs($user);
        $response->assertStatus(302);
        $response->assertSee('/');
    }
    public function test_login_with_admin_user()
    {
        $user = User::factory()->create([
            'email' => 'admin2@example.com',
            'password' => 'admin2',
            'utype' => 'ADM',
        ]);

        $response = $this->post('/login', [
            'email' => 'admin2@example.com',
            'password' => 'admin2',
        ]);
        $this->assertAuthenticatedAs($user);
        $response->assertStatus(302);
        $response->assertSee('/admin/dashboard');
    }
    public function test_login_without_password_or_email()
    {
        $user = User::factory()->create([
            'email' => 'userabc@example.com',
            'password' => 'userabc',
        ]);
        // Gửi POST request không có mật khẩu
        $response = $this->post('/login', [
            'email' => 'userabc@example.com',
        ]);
        $response->assertStatus(302);
        $this->assertGuest();

        // Gửi POST request không có email
        $response = $this->post('/login', [
            'password' => 'userabc',
        ]);
        $response->assertStatus(302);
        $this->assertGuest();
    }
}
