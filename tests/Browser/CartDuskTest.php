<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
class CartDuskTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(4);
            $browser->loginAs($user->id)
                    ->visit('/laptops/Gaming/Asus/1')
                    ->pause(1000) // Chờ 1 giây để trang 
                    ->click('.btn-addCart')
                    ->pause(2000)
                    ->click('button.swal2-confirm.swal2-styled')
                    ->click('#cart-icon')
                    ->pause(2000)
                    ->assertSee('Laptop Asus ROG Strix G16 G614JI'); 
        });
    }
}
