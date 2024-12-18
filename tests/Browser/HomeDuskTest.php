<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomeDuskTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_home_basics_show_right(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Tìm kiếm')
                    ->assertSee('Sản phẩm bạn đã xem')
                    ->assertSee('Flash sale')
                    ->assertSee('Tư vấn bán hàng')
                    ->assertSee('Đổi trả miễn phí')
                    ->assertSee('Miễn phí vận chuyển')
                    ->assertSee('Đăng nhập')
                    ->assertSee('Đăng ký')
                    ->assertSee('FLASH SALE');
        });
    }
    public function test_home_header_sub_menu_show_right(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->mouseover('.header-menu-holder .item')
                    ->waitFor('.sub-menu') // Đợi menu con xuất hiện
                    ->assertVisible('.sub-menu');
        });
    }

    public function test_home_support_show_right(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->mouseover('.header-support-container')
                    ->waitFor('.global-support-container') // Đợi menu con xuất hiện
                    ->assertVisible('.global-support-container');
        });
    }
    public function test_simulation_home_sale_item_buy(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->pause(2000)
                    ->scrollTo('.product-deal-list')
                    ->pause(1000)
                    ->clickLink('MUA GIÁ SỐC')
                    ->assertPathIs('/login');
        });
    }

    public function test_simulation_home_sale_item_buy_authenticated(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->pause(1000)
                    ->type('email', 'user1@example.com')
                    ->type('password', 'user1')
                    ->press('Đăng nhập')
                    ->assertAuthenticated()
                    ->assertPathIs('/')
                    ->scrollTo('.product-deal-list')
                    ->pause(1000)
                    ->clickLink('MUA GIÁ SỐC')
                    ->assertPathIs('/cart');
        });
    }

    public function test_home_deal_items_count(): void
    {
        $this->browse(function (Browser $browser) {
            $count = $browser->visit('/')
                ->script("return document.querySelectorAll('.deal-item').length")[0]; // Đếm số lượng

            $this->assertEquals(1, $count, "Số lượng deal-item phải bằng 2.");
        });
    }
}
