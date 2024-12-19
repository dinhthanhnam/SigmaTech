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
                    ->visit('/')
                    ->click('#cart-icon')
                    ->pause(2000)
                    ->click('#select-all')
                    ->pause(1000)
                    ->clickLink('ĐẶT HÀNG NGAY')
                    ->pause(2000)
                    ->type('fullname', 'Nguyễn Duy Hưng')
                    ->type('phone', '0986435177')
                    ->type('address', 'Hà nội')
                    ->type('note', 'Giao hàng hỏa tốc')
                    ->scrollTo('.btn.w-100') // Cuộn xuống nút "ĐẶT HÀNG"
                    ->pause(1000) // Chờ để đảm bảo nút đã vào viewport
                    ->click('.btn.w-100') // Bấm vào nút
                    ->pause(2000) // Đợi 2 giây để kiểm tra kết quả
                    ->assertSee('Đặt hàng thành công');
        });
    }
    public function test_add_to_cart_and_order(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(4);
            $browser->loginAs($user->id)
                    ->visit('/')
                    ->scrollTo('.p-add-btn')
                    ->click('.p-add-btn')
                    ->pause(2000)
                    ->click('button.swal2-confirm.swal2-styled')
                    ->click('#cart-icon')
                    ->pause(2000)
                    ->click('#select-all')
                    ->pause(1000)
                    ->clickLink('ĐẶT HÀNG NGAY')
                    ->pause(2000)
                    ->type('fullname', 'Nguyễn Duy Hưng')
                    ->type('phone', '0986435177')
                    ->type('address', 'Hà nội')
                    ->type('note', 'Giao hàng hỏa tốc')
                    ->scrollTo('.btn.w-100') // Cuộn xuống nút "ĐẶT HÀNG"
                    ->pause(1000) // Chờ để đảm bảo nút đã vào viewport
                    ->click('.btn.w-100') // Bấm vào nút
                    ->pause(2000) // Đợi 2 giây để kiểm tra kết quả
                    ->assertSee('Đặt hàng thành công');
        });
    }
}
