<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;


class UserAcountDuskTest extends DuskTestCase
{
    public function test_user_account(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(4);
            $browser->loginAs($user->id)
                    ->visit('/')
                    ->clickLink('user')
                    ->pause(2000)
                    ->clickLink('Thông tin tài khoản')
                    ->pause(1000)
                    ->type('#full-name', 'Nguyễn Duy Hưng')
                    ->pause(1000) // Chờ để đảm bảo nút đã vào viewport
                    ->click('.btn-save') // Bấm vào nút
                    ->pause(2000) 
                    ->acceptDialog()
                    ->pause(2000) 
                    ->assertSee('Nguyễn Duy Hưng');
        });
    }
}
