<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Notifications\CustomVerifyEmail;
use App\Notifications\CustomResetPasswordEmail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModelTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function it_can_create_a_user_with_valid_attributes()
    {
        // Tạo một User với các thuộc tính hợp lệ
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password123'),
            'phone' => '123456789',
            'gender' => 'Male',
            'address' => '123 Main St',
            'utype' => 'customer',
        ]);

        // Kiểm tra User đã được tạo thành công
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('John Doe', $user->name);
        $this->assertEquals('johndoe@example.com', $user->email);
        $this->assertEquals('123456789', $user->phone);
    }

    /** @test */
    public function it_has_fillable_attributes()
    {
        $user = new User();

        $this->assertEquals(
            ['name', 'email', 'password', 'phone', 'gender', 'address', 'utype'],
            $user->getFillable()
        );
    }

    /** @test */
    public function it_has_hidden_and_casted_attributes()
    {
        $user = new User();

        // Kiểm tra các thuộc tính hidden
        $this->assertEquals(['password', 'remember_token'], $user->getHidden());

        // Kiểm tra thuộc tính casts
        $this->assertEquals([
            'id' => 'int',                   // Laravel tự động cast id sang int
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'deleted_at' => 'datetime',      // SoftDeletes tự động cast deleted_at
        ], $user->getCasts());
    }

    /** @test */
    public function it_sends_email_verification_notification()
    {
        // Giả lập Notification facade
        Notification::fake();

        $user = User::factory()->make();

        // Gọi phương thức gửi email xác thực
        $user->sendEmailVerificationNotification();

        // Kiểm tra notification đã được gửi
        Notification::assertSentTo(
            [$user],
            CustomVerifyEmail::class
        );
    }

    /** @test */
    public function it_sends_password_reset_notification()
    {
        // Giả lập Notification facade
        Notification::fake();

        $user = User::factory()->make();

        // Gọi phương thức gửi email reset mật khẩu
        $user->sendPasswordResetNotification('fake-token');

        // Kiểm tra notification đã được gửi
        Notification::assertSentTo(
            [$user],
            function (CustomResetPasswordEmail $notification) {
                return $notification->token === 'fake-token';
            }
        );
    }
}
