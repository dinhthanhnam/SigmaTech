<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminSearchDuskTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_simulation_admin_search(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@example.com')
                    ->type('password', 'admin')
                    ->press('Đăng nhập')
                    ->pause(1000)
                    ->assertPathIs('/admin/dashboard')
                    ->click('.app-menu__item[href="http://127.0.0.1:8000/admin/product"]')
                    ->assertPathIs('/admin/product')
                    ->type('#searchQuery', 'rog')
                    ->assertSee('ROG')
                    ->pause(2000);
        });
    }
}
