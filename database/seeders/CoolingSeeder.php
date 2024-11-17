<?php

namespace Database\Seeders;

use App\Models\CoolingAttribute;
use Illuminate\Database\Seeder;
use App\Models\Attribute;
use App\Models\Cooling;
use App\Models\Product;

class CoolingSeeder extends Seeder
{
    public function run()
    {
        $coolings = [
            [
                'name' => 'Cooler Master Hyper 212 Black Edition',
                'category_id' => 7, // Cooling category
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'Cooler Master'],
                    ['name' => 'Model', 'value' => 'Hyper 212 Black Edition'],
                    ['name' => 'Price', 'value' => 1190000],
                    ['name' => 'Deal Price', 'value' => 1090000],
                    ['name' => 'Sale Price', 'value' => 999000],
                    ['name' => 'Rating', 'value' => 4.8],
                    ['name' => 'On Top', 'value' => '1'],
                    ['name' => 'Tồn kho', 'value' => 50],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/cooling/air-cooler/Thumb1.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/cooling/air-cooler/Thumb1_small.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/cooling/air-cooler/Image1.jpg'],
                    ['name' => 'Image2', 'value' => '/assets/img/products/cooling/air-cooler/Image2.jpg'],
                    ['name' => 'Image3', 'value' => '/assets/img/products/cooling/air-cooler/Image3.jpg'],
                    ['name' => 'Image4', 'value' => '/assets/img/products/cooling/air-cooler/Image4.jpg'],
                    ['name' => 'Image5', 'value' => '/assets/img/products/cooling/air-cooler/Image5.jpg'],
                    ['name' => '[Cooling] Loại làm mát', 'value' => 'Air Cooler'],
                    ['name' => '[Cooling] Kích thước quạt', 'value' => '120mm'],
                    ['name' => '[Cooling] Tốc độ quạt', 'value' => '600-2000 RPM'],
                    ['name' => '[Cooling] Độ ồn', 'value' => '26dBA'],
                    ['name' => '[Cooling] TDP hỗ trợ', 'value' => '180W'],
                    ['name' => '[Cooling] Kích thước', 'value' => '159x120x79mm'],
                    ['name' => '[Cooling] Tương thích socket', 'value' => 'Intel LGA 1700, AMD AM5/AM4'],
                ],
            ],
            [
                'name' => 'NZXT Kraken X63 RGB',
                'category_id' => 7, // Cooling category
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'NZXT'],
                    ['name' => 'Model', 'value' => 'Kraken X63 RGB'],
                    ['name' => 'Price', 'value' => 4990000],
                    ['name' => 'Deal Price', 'value' => 4690000],
                    ['name' => 'Sale Price', 'value' => 4490000],
                    ['name' => 'Rating', 'value' => 4.9],
                    ['name' => 'On Top', 'value' => '1'],
                    ['name' => 'Tồn kho', 'value' => 20],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/cooling/liquid-cooler/Thumb2.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/cooling/liquid-cooler/Thumb2_small.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/cooling/liquid-cooler/Image1.jpg'],
                    ['name' => 'Image2', 'value' => '/assets/img/products/cooling/liquid-cooler/Image2.jpg'],
                    ['name' => 'Image3', 'value' => '/assets/img/products/cooling/liquid-cooler/Image3.jpg'],
                    ['name' => 'Image4', 'value' => '/assets/img/products/cooling/liquid-cooler/Image4.jpg'],
                    ['name' => 'Image5', 'value' => '/assets/img/products/cooling/liquid-cooler/Image5.jpg'],
                    ['name' => '[Cooling] Loại làm mát', 'value' => 'Liquid Cooler'],
                    ['name' => '[Cooling] Kích thước tản nhiệt', 'value' => '280mm'],
                    ['name' => '[Cooling] Tốc độ quạt', 'value' => '500-1800 RPM'],
                    ['name' => '[Cooling] Độ ồn', 'value' => '21-38dBA'],
                    ['name' => '[Cooling] Bơm nước', 'value' => 'Asetek Gen 7 Pump'],
                    ['name' => '[Cooling] TDP hỗ trợ', 'value' => '300W'],
                    ['name' => '[Cooling] Tương thích socket', 'value' => 'Intel LGA 1700, AMD AM5/AM4'],
                ],
            ],
            [
                'name' => 'Noctua NH-D15 chromax.black',
                'category_id' => 7, // Cooling category
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'Noctua'],
                    ['name' => 'Model', 'value' => 'NH-D15 chromax.black'],
                    ['name' => 'Price', 'value' => 2990000],
                    ['name' => 'Deal Price', 'value' => 2790000],
                    ['name' => 'Sale Price', 'value' => 2690000],
                    ['name' => 'Rating', 'value' => 4.8],
                    ['name' => 'On Top', 'value' => '1'],
                    ['name' => 'Tồn kho', 'value' => 40],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/cooling/air-cooler/Thumb3.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/cooling/air-cooler/Thumb3_small.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/cooling/air-cooler/Image1.jpg'],
                    ['name' => 'Image2', 'value' => '/assets/img/products/cooling/air-cooler/Image2.jpg'],
                    ['name' => 'Image3', 'value' => '/assets/img/products/cooling/air-cooler/Image3.jpg'],
                    ['name' => 'Image4', 'value' => '/assets/img/products/cooling/air-cooler/Image4.jpg'],
                    ['name' => 'Image5', 'value' => '/assets/img/products/cooling/air-cooler/Image5.jpg'],
                    ['name' => '[Cooling] Loại làm mát', 'value' => 'Air Cooler'],
                    ['name' => '[Cooling] Kích thước quạt', 'value' => '140mm'],
                    ['name' => '[Cooling] Tốc độ quạt', 'value' => '300-1500 RPM'],
                    ['name' => '[Cooling] Độ ồn', 'value' => '24.6dBA'],
                    ['name' => '[Cooling] TDP hỗ trợ', 'value' => '250W'],
                    ['name' => '[Cooling] Kích thước', 'value' => '165x150x135mm'],
                    ['name' => '[Cooling] Tương thích socket', 'value' => 'Intel LGA 1700, AMD AM5/AM4'],
                ],
            ],
            [
                'name' => 'be quiet! Dark Rock Pro 4',
                'category_id' => 7, // Cooling category
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'be quiet!'],
                    ['name' => 'Model', 'value' => 'Dark Rock Pro 4'],
                    ['name' => 'Price', 'value' => 2890000],
                    ['name' => 'Deal Price', 'value' => 2690000],
                    ['name' => 'Sale Price', 'value' => 2590000],
                    ['name' => 'Rating', 'value' => 4.7],
                    ['name' => 'On Top', 'value' => '0'],
                    ['name' => 'Tồn kho', 'value' => 30],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/cooling/air-cooler/Thumb4.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/cooling/air-cooler/Thumb4_small.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/cooling/air-cooler/Image6.jpg'],
                    ['name' => 'Image2', 'value' => '/assets/img/products/cooling/air-cooler/Image7.jpg'],
                    ['name' => 'Image3', 'value' => '/assets/img/products/cooling/air-cooler/Image8.jpg'],
                    ['name' => 'Image4', 'value' => '/assets/img/products/cooling/air-cooler/Image9.jpg'],
                    ['name' => 'Image5', 'value' => '/assets/img/products/cooling/air-cooler/Image10.jpg'],
                    ['name' => '[Cooling] Loại làm mát', 'value' => 'Air Cooler'],
                    ['name' => '[Cooling] Kích thước quạt', 'value' => '135mm'],
                    ['name' => '[Cooling] Tốc độ quạt', 'value' => '400-1500 RPM'],
                    ['name' => '[Cooling] Độ ồn', 'value' => '24.3dBA'],
                    ['name' => '[Cooling] TDP hỗ trợ', 'value' => '250W'],
                    ['name' => '[Cooling] Kích thước', 'value' => '163x136x145mm'],
                    ['name' => '[Cooling] Tương thích socket', 'value' => 'Intel LGA 1700, AMD AM5/AM4'],
                ],
            ],
            [
                'name' => 'Cooler Master Hyper 212 Black Edition',
                'category_id' => 7, // Cooling category
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'Cooler Master'],
                    ['name' => 'Model', 'value' => 'Hyper 212 Black Edition'],
                    ['name' => 'Price', 'value' => 1190000],
                    ['name' => 'Deal Price', 'value' => 1090000],
                    ['name' => 'Sale Price', 'value' => 999000],
                    ['name' => 'Rating', 'value' => 4.6],
                    ['name' => 'On Top', 'value' => '1'],
                    ['name' => 'Tồn kho', 'value' => 50],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/cooling/air-cooler/Thumb5.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/cooling/air-cooler/Thumb5_small.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/cooling/air-cooler/Image11.jpg'],
                    ['name' => 'Image2', 'value' => '/assets/img/products/cooling/air-cooler/Image12.jpg'],
                    ['name' => 'Image3', 'value' => '/assets/img/products/cooling/air-cooler/Image13.jpg'],
                    ['name' => 'Image4', 'value' => '/assets/img/products/cooling/air-cooler/Image14.jpg'],
                    ['name' => 'Image5', 'value' => '/assets/img/products/cooling/air-cooler/Image15.jpg'],
                    ['name' => '[Cooling] Loại làm mát', 'value' => 'Air Cooler'],
                    ['name' => '[Cooling] Kích thước quạt', 'value' => '120mm'],
                    ['name' => '[Cooling] Tốc độ quạt', 'value' => '600-2000 RPM'],
                    ['name' => '[Cooling] Độ ồn', 'value' => '26dBA'],
                    ['name' => '[Cooling] TDP hỗ trợ', 'value' => '180W'],
                    ['name' => '[Cooling] Kích thước', 'value' => '158x129x105mm'],
                    ['name' => '[Cooling] Tương thích socket', 'value' => 'Intel LGA 1700, AMD AM5/AM4'],
                ],
            ],
            [
                'name' => 'Thermalright Frost Commander 140',
                'category_id' => 7, // Cooling category
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'Thermalright'],
                    ['name' => 'Model', 'value' => 'Frost Commander 140'],
                    ['name' => 'Price', 'value' => 1790000],
                    ['name' => 'Deal Price', 'value' => 1690000],
                    ['name' => 'Sale Price', 'value' => 1590000],
                    ['name' => 'Rating', 'value' => 4.8],
                    ['name' => 'On Top', 'value' => '0'],
                    ['name' => 'Tồn kho', 'value' => 25],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/cooling/air-cooler/Thumb6.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/cooling/air-cooler/Thumb6_small.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/cooling/air-cooler/Image16.jpg'],
                    ['name' => 'Image2', 'value' => '/assets/img/products/cooling/air-cooler/Image17.jpg'],
                    ['name' => 'Image3', 'value' => '/assets/img/products/cooling/air-cooler/Image18.jpg'],
                    ['name' => 'Image4', 'value' => '/assets/img/products/cooling/air-cooler/Image19.jpg'],
                    ['name' => 'Image5', 'value' => '/assets/img/products/cooling/air-cooler/Image20.jpg'],
                    ['name' => '[Cooling] Loại làm mát', 'value' => 'Air Cooler'],
                    ['name' => '[Cooling] Kích thước quạt', 'value' => '140mm'],
                    ['name' => '[Cooling] Tốc độ quạt', 'value' => '500-1500 RPM'],
                    ['name' => '[Cooling] Độ ồn', 'value' => '25.6dBA'],
                    ['name' => '[Cooling] TDP hỗ trợ', 'value' => '280W'],
                    ['name' => '[Cooling] Kích thước', 'value' => '164x140x126mm'],
                    ['name' => '[Cooling] Tương thích socket', 'value' => 'Intel LGA 1700, AMD AM5/AM4'],
                ],
            ],
            [
                'name' => 'Corsair iCUE H150i ELITE CAPELLIX XT',
                'category_id' => 7, // Cooling category
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'Corsair'],
                    ['name' => 'Model', 'value' => 'iCUE H150i ELITE CAPELLIX XT'],
                    ['name' => 'Price', 'value' => 5990000],
                    ['name' => 'Deal Price', 'value' => 5790000],
                    ['name' => 'Sale Price', 'value' => 5690000],
                    ['name' => 'Rating', 'value' => 4.9],
                    ['name' => 'On Top', 'value' => '1'],
                    ['name' => 'Tồn kho', 'value' => 10],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/cooling/liquid-cooler/Thumb7.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/cooling/liquid-cooler/Thumb7_small.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/cooling/liquid-cooler/Image21.jpg'],
                    ['name' => 'Image2', 'value' => '/assets/img/products/cooling/liquid-cooler/Image22.jpg'],
                    ['name' => 'Image3', 'value' => '/assets/img/products/cooling/liquid-cooler/Image23.jpg'],
                    ['name' => 'Image4', 'value' => '/assets/img/products/cooling/liquid-cooler/Image24.jpg'],
                    ['name' => 'Image5', 'value' => '/assets/img/products/cooling/liquid-cooler/Image25.jpg'],
                    ['name' => '[Cooling] Loại làm mát', 'value' => 'Liquid Cooler'],
                    ['name' => '[Cooling] Kích thước tản nhiệt', 'value' => '360mm'],
                    ['name' => '[Cooling] Tốc độ quạt', 'value' => '400-2000 RPM'],
                    ['name' => '[Cooling] Độ ồn', 'value' => '20-37dBA'],
                    ['name' => '[Cooling] Bơm nước', 'value' => 'Magnetic Levitation Pump'],
                    ['name' => '[Cooling] TDP hỗ trợ', 'value' => '350W'],
                    ['name' => '[Cooling] Tương thích socket', 'value' => 'Intel LGA 1700, AMD AM5/AM4'],
                ],
            ],
            
        ];

        foreach ($coolings as $coolingData) {
            $cooling = Cooling::create([
                'name' => $coolingData['name'],
                'category_id' => $coolingData['category_id'],
            ]);
        
            foreach ($coolingData['attributes'] as $attr) {
                $attribute = Attribute::firstOrCreate(['name' => $attr['name']]);
                CoolingAttribute::create([
                    'cooling_id' => $cooling->id,
                    'attribute_id' => $attribute->id,
                    'value' => $attr['value'],
                ]);
            }
        }
    }
}
