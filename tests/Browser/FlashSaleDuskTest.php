<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FlashSaleDuskTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_flash_sale_deal_items_count(): void
    {
        $this->browse(function (Browser $browser) {
            $count = $browser->visit('/flash-sale')
                ->script("return document.querySelectorAll('.deal-item').length")[0]; // Đếm số lượng

            $this->assertEquals(1, $count, "Số lượng deal-item phải bằng 2.");
        });
    }

}
