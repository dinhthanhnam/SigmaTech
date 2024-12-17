<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterDuskTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_register_with_all_field_required_successfully(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'John Doe') 
                    ->pause(1000)
                    ->type('email', 'johndoe@example.com') 
                    ->pause(1000)
                    ->type('password', 'password123') 
                    ->pause(1000)
                    ->type('password_confirmation', 'password123')
                    ->pause(1000)
                    ->type('phone', 'password123') 
                    ->pause(1000)
                    ->press('TẠO TÀI KHOẢN')
                    ->assertPathIs('/')
                    ->assertAuthenticated() 
                    ->pause(1000); 
        });
        DB::table('users')->where('email', 'johndoe@example.com')->delete();
    }
    public function test_register_with_missing_name_field(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('email', 'johndoe@example.com')
                    ->pause(1000)
                    ->type('password', 'password123')
                    ->pause(1000)
                    ->type('password_confirmation', 'password123')
                    ->pause(1000)
                    ->press('TẠO TÀI KHOẢN')
                    ->assertSee('Họ và tên là bắt buộc.') // Kiểm tra thông báo lỗi khi thiếu số điện thoại
                    ->pause(1000);
        });
    }

    public function test_register_with_missing_email_field(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'John Doe')
                    ->pause(1000)
                    ->type('password', 'password123')
                    ->pause(1000)
                    ->type('password_confirmation', 'password123')
                    ->pause(1000)
                    ->press('TẠO TÀI KHOẢN')
                    ->assertSee('Email là bắt buộc.') // Kiểm tra thông báo lỗi khi thiếu số điện thoại
                    ->pause(1000);
        });
    }

    public function test_register_with_not_matched_password(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'John Doe')
                    ->pause(1000)
                    ->type('email', 'johndoe@example.com')
                    ->pause(1000)
                    ->type('password', 'password123')
                    ->pause(1000)
                    ->type('password_confirmation', 'password123213')
                    ->pause(1000)
                    ->press('TẠO TÀI KHOẢN')
                    ->assertSee('Mật khẩu xác nhận không khớp.') // Kiểm tra thông báo lỗi khi thiếu số điện thoại
                    ->pause(1000);
        });
    }
    public function test_register_with_existing_email(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'John Doe')
                    ->pause(1000)
                    ->type('email', 'user1@example.com') // email đã tồn tại trước đó
                    ->pause(1000)
                    ->type('password', 'password123')
                    ->pause(1000)
                    ->type('password_confirmation', 'password123')
                    ->pause(1000)
                    ->press('TẠO TÀI KHOẢN')
                    ->assertSee('Email này đã được sử dụng.') // Kiểm tra thông báo lỗi khi thiếu số điện thoại
                    ->pause(1000);
        });
    }

}
