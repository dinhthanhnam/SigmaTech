<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\ResetPasswordHelper;

class ForgotPasswordDuskTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_send_email_forgot_password(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/password/reset')
                    ->type('email', 'user1@example.com')
                    ->pause(1000)
                    ->assertSee('Địa chỉ Email cần đặt lại')
                    ->type('email', 'user1@example.com')
                    ->press('Gửi Email đặt lại mật khẩu')
                    ->pause(1000)
                    ->assertSee('Liên kết đặt lại mật khẩu đã được gửi đến email của bạn.');
        });
    }
}
