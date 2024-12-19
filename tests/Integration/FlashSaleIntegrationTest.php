<?php

namespace Tests\Feature;

use App\Models\Laptop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FlashSaleIntegrationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    // public function test_flash_sale_item_have_correct_remaining_time(): void
    // {
    //     $response = $this->get('/flash-sale');
    
    //     $data = $response->original->getData();
    //     $flashSaleItems = $data['flashSaleItems'];
    
    //     $remainingtime_getright = 0;
    
    //     foreach ($flashSaleItems as $item) {
    //         // Tìm laptop hiện tại
    //         $laptop = Laptop::find($item->id);
    
    //         // Kiểm tra "Sale End Date" tồn tại
    //         $saleEndDateAttribute = $laptop->attributes->firstWhere('name', 'Sale End Date');
    //         if ($saleEndDateAttribute && $saleEndDateAttribute->pivot->value) {
    //             $saleEndDate = strtotime($saleEndDateAttribute->pivot->value);
    //             dd($saleEndDate);
    //             // Kiểm tra xem giá trị "Sale End Date" khớp với item trả về
    //             if ($saleEndDate == $item['Sale End Date']) {
    //                 $remainingtime_getright++;
    //             }
    //         }
    //     }
    
    //     // Kiểm tra số lượng item có thời gian đúng
    //     $this->assertEquals($flashSaleItems->count(), $remainingtime_getright);
    // }
    public function test_flash_sale_item_have_correct_discount_percentage(): void
    {
        $response = $this->get('/flash-sale');
    
        $data = $response->original->getData();
        $flashSaleItems = $data['flashSaleItems'];
    
        foreach ($flashSaleItems as $item) {
            // Tìm laptop hiện tại
            $laptop = Laptop::find($item->id);
    
            $price = $laptop->attributes->firstWhere('name', 'Price');
            $saleprice = $laptop->attributes->firstWhere('name', 'Sale Price');
            if ($price && $saleprice) {
                $discountPercentage = round((1 - $saleprice->pivot->value / $price->pivot->value) * 100);
            };
            
            $response->assertSee($discountPercentage);
        }
    }
}
