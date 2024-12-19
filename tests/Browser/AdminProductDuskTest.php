<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class AdminProductDuskTest extends DuskTestCase
{
    public function test_add_product(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::first();
            $browser->loginAs($user->id)
                    ->visit('/admin/product')
                    ->clickLink('Tạo mới sản phẩm')
                    ->pause(2000)
                    ->select('.form-control', 'laptops') // Chọn giá trị laptops
                    ->pause(2000)
                    ->type('name', 'Laptop ABC')
                    ->select('brand', 'Asus')
                    ->select('laptop_loai_laptop', 'Gaming')
                    ->type('price', '999999999')
                    ->type('deal_price', '555555555')
                    ->type('rating', '5')
                    ->scrollTo('.btn-save') // Cuộn xuống nút "ĐẶT HÀNG"
                    ->pause(1000) // Chờ để đảm bảo nút đã vào viewport
                    ->click('.btn-save') // Bấm vào nút
                    ->pause(5000) // Đợi 2 giây để kiểm tra kết quả
                    ->acceptDialog();
        });
    }
}
