<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
class OrderDuskTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_order_product(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(4);
            $browser->loginAs($user->id)
                    ->click('.btn-addCart')
                    ->pause(2000)
                    ->click('#select-all')
                    ->pause(1000)
                    ->clickLink('ĐẶT HÀNG NGAY')
                    ->pause(2000)
                    ->assertSee('Laptop Asus ROG Strix G16 G614JI');
        });
    }
}
