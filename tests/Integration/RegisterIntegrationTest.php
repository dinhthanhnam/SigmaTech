<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterIntegrationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_user_can_register_successfully(): void
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];
    
        $response = $this->post('/register', $data);
    
        $response->assertStatus(302); 
        $response->assertRedirect('/'); 
        $this->assertDatabaseHas('users', [
            'email' => 'johndoe@example.com',
        ]);
    }
    public function test_register_requires_all_fields(): void
    {
        $response = $this->post('/register', []);

        $response->assertSessionHasErrors([
            'name',
            'email',
            'password',
            'phone',
        ]);
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
    public function test_register_requires_valid_email(): void
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'invalid-email',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];
    
        $response = $this->post('/register', $data);
    
        $response->assertSessionHasErrors(['email']);
    }
    
}
