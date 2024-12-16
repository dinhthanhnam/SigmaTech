<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
    public function test_password_request_form_should_show(): void
    {
        $response = $this->get('/password/reset');
        $response->assertStatus(200);
        $response->assertSee('Đặt lại mật khẩu');
        $response->assertSee('Địa chỉ Email cần đặt lại');
    }
    public function test_user_login_should_be_redirected_to_home(): void
    {
        $response = $this->get('/login');
        $user = User::factory()->create();
        $this->actingAs($user);
        $response->assertRedirect('/');
        $response->assertStatus(200);
    }
    public function test_unauthenticated_user_shouldnt_see_account_dashboard(): void
    {
        $response = $this->get('/account');
        $response->assertStatus(302);
    }
    public function test_unauthenticated_user_shouldnt_see_admin_dashboard(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/account');
        $response->assertSee('/account');
    }
    public function test_non_admin_user_shouldnt_see_admin_dashboard(): void
    {
        $user = User::factory()->create(['utype'=>'USR']);
        $this->actingAs($user);
        $response = $this->get('/admin/dashboard');
        $response->assertForbidden();
        $response = $this->get('/admin');
        $response->assertForbidden();
    }
    public function test_admin_user_should_see_admin_dashboard(): void
    {
        $user = User::factory()->create(['utype'=>'ADM']);
        $this->actingAs($user);
        $response = $this->get('admin/dashboard');
        $response->assertSee(route('admin.index'));
        $response = $this->get('admin');
        $response->assertSee(route('admin.index'));
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
    public function test_authenticated_user_should_be_able_to_request_password(): void
    {
        $response = $this->get('/password/reset');
        $response->assertStatus(200);
        $response->assertSee('Đặt lại mật khẩu');
        $response->assertSee('Địa chỉ Email cần đặt lại');
    }
}
