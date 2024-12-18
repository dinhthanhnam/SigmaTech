<?php

namespace Tests\Browser;

use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginDuskTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_simulation_login_with_non_admin_user_successfully(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'user1@example.com')
                    ->pause(1000)
                    ->type('password', 'user1')
                    ->pause(1000)
                    ->press('Đăng nhập')
                    ->assertPathIs('/')
                    ->press('Đăng xuất')
                    ->pause(1000);
        });
    }
}
