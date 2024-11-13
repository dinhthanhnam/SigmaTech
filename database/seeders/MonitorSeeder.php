<?php

namespace Database\Seeders;

use App\Models\Monitor;
use App\Models\Attribute;
use App\Models\MonitorAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $monitors = [
            [
                'name' => 'Màn Hình Gaming ASUS TUF VG249Q3A',
                'category_id' => 4,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'Asus'],
                    ['name' => 'Model', 'value' => 'MOAS0143'],
                    ['name' => 'Price', 'value' => '4189000'],
                    ['name' => 'Deal Price', 'value' => '3189000'],
                    ['name' => 'Rating', 'value' => '5'],
                    ['name' => 'On Top', 'value' => '1'],
                    ['name' => 'Sale Price', 'value' => '3090000'],
                    ['name' => 'Sale Start Date', 'value' => '2024-11-12'],
                    ['name' => 'Sale End Date', 'value' => '2024-11-18'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/monitors/Asus/1/Thumb.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/monitors/Asus/1/Thumb_small.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/monitors/Asus/1/Image1.jpg'],
                    ['name' => 'Image2', 'value' => '/assets/img/products/monitors/Asus/1/Image2.jpg'],
                    ['name' => 'Image3', 'value' => '/assets/img/products/monitors/Asus/1/Image3.jpg'],
                    ['name' => '[MON] Kiểu dáng màn hình', 'value' => 'Phẳng'],
                    ['name' => '[MON] Tỉ lệ khung hình', 'value' => '16:9'],
                    ['name' => '[MON] Kích thước mặc định', 'value' => '23.8 inch'],
                    ['name' => '[MON] Công nghệ tấm nền', 'value' => 'Fast IPS'],
                    ['name' => '[MON] Phân giải điểm ảnh', 'value' => 'FHD - 1920 x 1080'],
                    ['name' => '[MON] Độ sáng hiển thị', 'value' => '250 Nits cd/m2'],
                    ['name' => '[MON] Tần số quét', 'value' => '180 Hz'],
                    ['name' => '[MON] Thời gian đáp ứng', 'value' => '1ms'],
                    ['name' => '[MON] Chỉ số màu sắc', 'value' => '16.7 triệu màu - 99% sRGB - 8 bits'],
                    ['name' => '[MON] Hỗ trợ tiêu chuẩn', 'value' => 'VESA (100 mm x 100 mm) - ELMB Sync - AMD FreeSync Premium - G-Sync Compatible'],
                    ['name' => '[MON] Cổng cắm kết nối', 'value' => '2xHDMI 2.0, 1xDisplayPort 1.2, 1x3.5mm Earphone Jack'],
                    ['name' => '[MON] Phụ kiện trọng hộp', 'value' => 'Dây nguồn, Dây HDMI, Dây DP'],
                    ['name' => '[MON] Điện năng tiêu thụ', 'value' => 'Tối đa: 18W, Powersaving: 0.5W'],
                    ['name' => '[MON] Thiết kế cơ học', 'value' => 'Nghiêng (+23° ~ -5°)'],
                    ['name' => '[MON] Tính năng âm thanh', 'value' => 'Speaker: Yes(2Wx2)'],
                    ['name' => '[MON] Trọng lượng', 'value' => '3.5kg'],
                ]
            ],
            [
                'name' => 'Màn Hình Gaming ASUS TUF VG27AQ',
                'category_id' => 4,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'Asus'],
                    ['name' => 'Model', 'value' => 'MOAS0150'],
                    ['name' => 'Price', 'value' => '8900000'],
                    ['name' => 'Deal Price', 'value' => '7590000'],
                    ['name' => 'Rating', 'value' => '5'],
                    ['name' => 'On Top', 'value' => '1'],
                    ['name' => 'Sale Price', 'value' => '7390000'],
                    ['name' => 'Sale Start Date', 'value' => '2024-11-10'],
                    ['name' => 'Sale End Date', 'value' => '2024-11-20'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/monitors/Asus/2/Thumb.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/monitors/Asus/2/Thumb_small.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/monitors/Asus/2/Image1.jpg'],
                    ['name' => '[MON] Kiểu dáng màn hình', 'value' => 'Cong'],
                    ['name' => '[MON] Tỉ lệ khung hình', 'value' => '16:9'],
                    ['name' => '[MON] Kích thước mặc định', 'value' => '27 inch'],
                    ['name' => '[MON] Công nghệ tấm nền', 'value' => 'IPS'],
                    ['name' => '[MON] Phân giải điểm ảnh', 'value' => 'QHD - 2560 x 1440'],
                    ['name' => '[MON] Độ sáng hiển thị', 'value' => '350 Nits cd/m2'],
                    ['name' => '[MON] Tần số quét', 'value' => '165 Hz'],
                    ['name' => '[MON] Thời gian đáp ứng', 'value' => '1ms'],
                    ['name' => '[MON] Chỉ số màu sắc', 'value' => '1.07 tỷ màu - 99% DCI-P3 - 10 bits'],
                    ['name' => '[MON] Hỗ trợ tiêu chuẩn', 'value' => 'VESA, G-Sync Compatible, HDR10'],
                    ['name' => '[MON] Cổng cắm kết nối', 'value' => '2xHDMI 2.0, 1xDisplayPort 1.4, 1xUSB'],
                    ['name' => '[MON] Phụ kiện trọng hộp', 'value' => 'Dây nguồn, Dây HDMI'],
                    ['name' => '[MON] Điện năng tiêu thụ', 'value' => 'Tối đa: 27W'],
                    ['name' => '[MON] Thiết kế cơ học', 'value' => 'Nghiêng, Xoay'],
                    ['name' => '[MON] Trọng lượng', 'value' => '5.8kg'],
                ]
            ],
            [
                'name' => 'Màn Hình ASUS ProArt Display PA278QV',
                'category_id' => 4,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'Asus'],
                    ['name' => 'Model', 'value' => 'MOAS0151'],
                    ['name' => 'Price', 'value' => '7490000'],
                    ['name' => 'Deal Price', 'value' => '6890000'],
                    ['name' => 'Rating', 'value' => '5'],
                    ['name' => 'On Top', 'value' => '1'],
                    ['name' => 'Sale Price', 'value' => '6590000'],
                    ['name' => 'Sale Start Date', 'value' => '2024-11-05'],
                    ['name' => 'Sale End Date', 'value' => '2024-11-15'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/monitors/Asus/3/Thumb.jpg'],
                    ['name' => '[MON] Kiểu dáng màn hình', 'value' => 'Phẳng'],
                    ['name' => '[MON] Tỉ lệ khung hình', 'value' => '16:9'],
                    ['name' => '[MON] Kích thước mặc định', 'value' => '27 inch'],
                    ['name' => '[MON] Công nghệ tấm nền', 'value' => 'IPS'],
                    ['name' => '[MON] Phân giải điểm ảnh', 'value' => 'WQHD - 2560 x 1440'],
                    ['name' => '[MON] Độ sáng hiển thị', 'value' => '350 Nits cd/m2'],
                    ['name' => '[MON] Tần số quét', 'value' => '75 Hz'],
                    ['name' => '[MON] Thời gian đáp ứng', 'value' => '5ms'],
                    ['name' => '[MON] Chỉ số màu sắc', 'value' => '1.07 tỷ màu - 100% sRGB - 10 bits'],
                    ['name' => '[MON] Hỗ trợ tiêu chuẩn', 'value' => 'VESA, Calman Verified'],
                    ['name' => '[MON] Cổng cắm kết nối', 'value' => '1xHDMI, 1xDisplayPort, 4xUSB'],
                    ['name' => '[MON] Phụ kiện trọng hộp', 'value' => 'Dây nguồn, Dây HDMI, Dây DP'],
                    ['name' => '[MON] Điện năng tiêu thụ', 'value' => 'Tối đa: 23W'],
                    ['name' => '[MON] Thiết kế cơ học', 'value' => 'Nghiêng, Xoay, Điều chỉnh chiều cao'],
                    ['name' => '[MON] Trọng lượng', 'value' => '6.2kg'],
                ]
            ],
            [
                'name' => 'Màn Hình Gaming ASUS ROG Swift PG259QNR',
                'category_id' => 4,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'Asus'],
                    ['name' => 'Model', 'value' => 'MOAS0152'],
                    ['name' => 'Price', 'value' => '15890000'],
                    ['name' => 'Deal Price', 'value' => '14790000'],
                    ['name' => 'Rating', 'value' => '5'],
                    ['name' => 'On Top', 'value' => '1'],
                    ['name' => 'Sale Price', 'value' => '14490000'],
                    ['name' => 'Sale Start Date', 'value' => '2024-11-15'],
                    ['name' => 'Sale End Date', 'value' => '2024-11-30'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/monitors/Asus/4/Thumb.jpg'],
                    ['name' => '[MON] Kiểu dáng màn hình', 'value' => 'Phẳng'],
                    ['name' => '[MON] Tỉ lệ khung hình', 'value' => '16:9'],
                    ['name' => '[MON] Kích thước mặc định', 'value' => '24.5 inch'],
                    ['name' => '[MON] Công nghệ tấm nền', 'value' => 'Fast IPS'],
                    ['name' => '[MON] Phân giải điểm ảnh', 'value' => 'FHD - 1920 x 1080'],
                    ['name' => '[MON] Độ sáng hiển thị', 'value' => '400 Nits cd/m2'],
                    ['name' => '[MON] Tần số quét', 'value' => '360 Hz'],
                    ['name' => '[MON] Thời gian đáp ứng', 'value' => '1ms'],
                    ['name' => '[MON] Chỉ số màu sắc', 'value' => '16.7 triệu màu'],
                    ['name' => '[MON] Hỗ trợ tiêu chuẩn', 'value' => 'VESA, Nvidia Reflex, G-Sync Compatible'],
                    ['name' => '[MON] Cổng cắm kết nối', 'value' => '2xHDMI, 1xDisplayPort, 1xUSB'],
                    ['name' => '[MON] Phụ kiện trọng hộp', 'value' => 'Dây nguồn, Dây HDMI, Dây DP'],
                    ['name' => '[MON] Điện năng tiêu thụ', 'value' => 'Tối đa: 30W'],
                    ['name' => '[MON] Thiết kế cơ học', 'value' => 'Nghiêng, Xoay, Điều chỉnh chiều cao'],
                    ['name' => '[MON] Trọng lượng', 'value' => '7.3kg'],
                ]
            ],
            [
                'name' => 'Màn Hình ASUS VZ239H-W',
                'category_id' => 4,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'Asus'],
                    ['name' => 'Model', 'value' => 'MOAS0153'],
                    ['name' => 'Price', 'value' => '4290000'],
                    ['name' => 'Deal Price', 'value' => '3890000'],
                    ['name' => 'Rating', 'value' => '4'],
                    ['name' => 'On Top', 'value' => '1'],
                    ['name' => 'Sale Price', 'value' => '3690000'],
                    ['name' => 'Sale Start Date', 'value' => '2024-11-01'],
                    ['name' => 'Sale End Date', 'value' => '2024-11-10'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/monitors/Asus/5/Thumb.jpg'],
                    ['name' => '[MON] Kiểu dáng màn hình', 'value' => 'Phẳng'],
                    ['name' => '[MON] Tỉ lệ khung hình', 'value' => '16:9'],
                    ['name' => '[MON] Kích thước mặc định', 'value' => '23 inch'],
                    ['name' => '[MON] Công nghệ tấm nền', 'value' => 'IPS'],
                    ['name' => '[MON] Phân giải điểm ảnh', 'value' => 'FHD - 1920 x 1080'],
                    ['name' => '[MON] Độ sáng hiển thị', 'value' => '250 Nits cd/m2'],
                    ['name' => '[MON] Tần số quét', 'value' => '60 Hz'],
                    ['name' => '[MON] Thời gian đáp ứng', 'value' => '5ms'],
                    ['name' => '[MON] Chỉ số màu sắc', 'value' => '16.7 triệu màu'],
                    ['name' => '[MON] Hỗ trợ tiêu chuẩn', 'value' => 'VESA'],
                    ['name' => '[MON] Cổng cắm kết nối', 'value' => '1xHDMI, 1xVGA'],
                    ['name' => '[MON] Phụ kiện trọng hộp', 'value' => 'Dây nguồn, Dây VGA'],
                    ['name' => '[MON] Điện năng tiêu thụ', 'value' => 'Tối đa: 22W'],
                    ['name' => '[MON] Thiết kế cơ học', 'value' => 'Nghiêng'],
                    ['name' => '[MON] Trọng lượng', 'value' => '3.5kg'],
                ]
            ]
        ];
        foreach ($monitors as $monitorData) {
            $monitor = Monitor::create([
                'name' => $monitorData['name'],
                'category_id' => $monitorData['category_id'],
            ]);
        
            foreach ($monitorData['attributes'] as $attr) {
                $attribute = Attribute::firstOrCreate(['name' => $attr['name']]);
                MonitorAttribute::create([
                    'monitor_id' => $monitor->id,
                    'attribute_id' => $attribute->id,
                    'value' => $attr['value'],
                ]);
            }
        }
    }
}
