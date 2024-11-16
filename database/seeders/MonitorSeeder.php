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
            ],
            [
                'name' => 'Màn Hình Dell UltraSharp U2723QE',
                'category_id' => 4,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'Dell'],
                    ['name' => 'Model', 'value' => 'MODE0150'],
                    ['name' => 'Price', 'value' => '15900000'],
                    ['name' => 'Deal Price', 'value' => '14900000'],
                    ['name' => 'Rating', 'value' => '5'],
                    ['name' => 'On Top', 'value' => '1'],
                    ['name' => 'Sale Price', 'value' => '13900000'],
                    ['name' => 'Sale Start Date', 'value' => '2024-11-13'],
                    ['name' => 'Sale End Date', 'value' => '2024-11-25'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/monitors/Dell/6/Thumb.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/monitors/Dell/6/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/monitors/Dell/6/Image1.jpg'],
                    ['name' => '[MON] Kiểu dáng màn hình', 'value' => 'Phẳng'],
                    ['name' => '[MON] Tỉ lệ khung hình', 'value' => '16:9'],
                    ['name' => '[MON] Kích thước mặc định', 'value' => '27 inch'],
                    ['name' => '[MON] Công nghệ tấm nền', 'value' => 'IPS'],
                    ['name' => '[MON] Phân giải điểm ảnh', 'value' => '4K - 3840 x 2160'],
                    ['name' => '[MON] Độ sáng hiển thị', 'value' => '400 Nits cd/m2'],
                    ['name' => '[MON] Tần số quét', 'value' => '60 Hz'],
                    ['name' => '[MON] Thời gian đáp ứng', 'value' => '5ms'],
                    ['name' => '[MON] Chỉ số màu sắc', 'value' => '1.07 tỷ màu - 100% sRGB'],
                    ['name' => '[MON] Hỗ trợ tiêu chuẩn', 'value' => 'VESA, HDR400'],
                    ['name' => '[MON] Cổng cắm kết nối', 'value' => '2xHDMI, 1xDisplayPort, 4xUSB-C'],
                    ['name' => '[MON] Phụ kiện trọng hộp', 'value' => 'Dây nguồn, Dây HDMI, Dây USB-C'],
                    ['name' => '[MON] Điện năng tiêu thụ', 'value' => 'Tối đa: 27W'],
                    ['name' => '[MON] Thiết kế cơ học', 'value' => 'Nghiêng, Xoay, Điều chỉnh chiều cao'],
                    ['name' => '[MON] Trọng lượng', 'value' => '6.2kg'],
                ]
            ],
            [
                'name' => 'Màn Hình Dell S3222DWG',
                'category_id' => 4,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'Dell'],
                    ['name' => 'Model', 'value' => 'MODE0151'],
                    ['name' => 'Price', 'value' => '12900000'],
                    ['name' => 'Deal Price', 'value' => '11900000'],
                    ['name' => 'Rating', 'value' => '5'],
                    ['name' => 'On Top', 'value' => '1'],
                    ['name' => 'Sale Price', 'value' => '10900000'],
                    ['name' => 'Sale Start Date', 'value' => '2024-11-10'],
                    ['name' => 'Sale End Date', 'value' => '2024-11-18'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/monitors/Dell/7/Thumb.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/monitors/Dell/7/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/monitors/Dell/7/Image1.jpg'],
                    ['name' => '[MON] Kiểu dáng màn hình', 'value' => 'Cong'],
                    ['name' => '[MON] Tỉ lệ khung hình', 'value' => '21:9'],
                    ['name' => '[MON] Kích thước mặc định', 'value' => '32 inch'],
                    ['name' => '[MON] Công nghệ tấm nền', 'value' => 'VA'],
                    ['name' => '[MON] Phân giải điểm ảnh', 'value' => 'WQHD - 3440 x 1440'],
                    ['name' => '[MON] Độ sáng hiển thị', 'value' => '400 Nits cd/m2'],
                    ['name' => '[MON] Tần số quét', 'value' => '144 Hz'],
                    ['name' => '[MON] Thời gian đáp ứng', 'value' => '1ms'],
                    ['name' => '[MON] Chỉ số màu sắc', 'value' => '16.7 triệu màu - 90% DCI-P3'],
                    ['name' => '[MON] Hỗ trợ tiêu chuẩn', 'value' => 'AMD FreeSync Premium'],
                    ['name' => '[MON] Cổng cắm kết nối', 'value' => '2xHDMI, 1xDisplayPort'],
                    ['name' => '[MON] Phụ kiện trọng hộp', 'value' => 'Dây nguồn, Dây HDMI'],
                    ['name' => '[MON] Điện năng tiêu thụ', 'value' => 'Tối đa: 50W'],
                    ['name' => '[MON] Thiết kế cơ học', 'value' => 'Nghiêng, Xoay'],
                    ['name' => '[MON] Trọng lượng', 'value' => '8.2kg'],
                ]
            ],
            [
                'name' => 'Màn Hình Dell P2422H',
                'category_id' => 4,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'Dell'],
                    ['name' => 'Model', 'value' => 'MODE0152'],
                    ['name' => 'Price', 'value' => '4990000'],
                    ['name' => 'Deal Price', 'value' => '4490000'],
                    ['name' => 'Rating', 'value' => '4'],
                    ['name' => 'On Top', 'value' => '1'],
                    ['name' => 'Sale Price', 'value' => '4290000'],
                    ['name' => 'Sale Start Date', 'value' => '2024-11-01'],
                    ['name' => 'Sale End Date', 'value' => '2024-11-11'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/monitors/Dell/8/Thumb.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/monitors/Dell/8/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/monitors/Dell/8/Image1.jpg'],
                    ['name' => '[MON] Kiểu dáng màn hình', 'value' => 'Phẳng'],
                    ['name' => '[MON] Tỉ lệ khung hình', 'value' => '16:9'],
                    ['name' => '[MON] Kích thước mặc định', 'value' => '24 inch'],
                    ['name' => '[MON] Công nghệ tấm nền', 'value' => 'IPS'],
                    ['name' => '[MON] Phân giải điểm ảnh', 'value' => 'FHD - 1920 x 1080'],
                    ['name' => '[MON] Độ sáng hiển thị', 'value' => '250 Nits cd/m2'],
                    ['name' => '[MON] Tần số quét', 'value' => '60 Hz'],
                    ['name' => '[MON] Thời gian đáp ứng', 'value' => '8ms'],
                    ['name' => '[MON] Chỉ số màu sắc', 'value' => '16.7 triệu màu'],
                    ['name' => '[MON] Hỗ trợ tiêu chuẩn', 'value' => 'VESA'],
                    ['name' => '[MON] Cổng cắm kết nối', 'value' => '1xHDMI, 1xDisplayPort, 1xVGA'],
                    ['name' => '[MON] Phụ kiện trọng hộp', 'value' => 'Dây nguồn, Dây HDMI, Dây VGA'],
                    ['name' => '[MON] Điện năng tiêu thụ', 'value' => 'Tối đa: 22W'],
                    ['name' => '[MON] Thiết kế cơ học', 'value' => 'Nghiêng, Xoay'],
                    ['name' => '[MON] Trọng lượng', 'value' => '5.4kg'],
                ]
            ],
            [
                'name' => 'Màn Hình Dell S2721DGF',
                'category_id' => 4,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'Dell'],
                    ['name' => 'Model', 'value' => 'MODE0153'],
                    ['name' => 'Price', 'value' => '9990000'],
                    ['name' => 'Deal Price', 'value' => '8990000'],
                    ['name' => 'Rating', 'value' => '5'],
                    ['name' => 'On Top', 'value' => '1'],
                    ['name' => 'Sale Price', 'value' => '8490000'],
                    ['name' => 'Sale Start Date', 'value' => '2024-11-12'],
                    ['name' => 'Sale End Date', 'value' => '2024-11-22'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/monitors/Dell/9/Thumb.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/monitors/Dell/9/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/monitors/Dell/9/Image1.jpg'],
                    ['name' => '[MON] Kiểu dáng màn hình', 'value' => 'Phẳng'],
                    ['name' => '[MON] Tỉ lệ khung hình', 'value' => '16:9'],
                    ['name' => '[MON] Kích thước mặc định', 'value' => '27 inch'],
                    ['name' => '[MON] Công nghệ tấm nền', 'value' => 'IPS'],
                    ['name' => '[MON] Phân giải điểm ảnh', 'value' => 'QHD - 2560 x 1440'],
                    ['name' => '[MON] Độ sáng hiển thị', 'value' => '400 Nits cd/m2'],
                    ['name' => '[MON] Tần số quét', 'value' => '165 Hz'],
                    ['name' => '[MON] Thời gian đáp ứng', 'value' => '1ms'],
                    ['name' => '[MON] Chỉ số màu sắc', 'value' => '16.7 triệu màu - 98% DCI-P3'],
                    ['name' => '[MON] Hỗ trợ tiêu chuẩn', 'value' => 'G-Sync Compatible, HDR'],
                    ['name' => '[MON] Cổng cắm kết nối', 'value' => '2xHDMI, 1xDisplayPort'],
                    ['name' => '[MON] Phụ kiện trọng hộp', 'value' => 'Dây nguồn, Dây DisplayPort'],
                    ['name' => '[MON] Điện năng tiêu thụ', 'value' => 'Tối đa: 48W'],
                    ['name' => '[MON] Thiết kế cơ học', 'value' => 'Nghiêng, Xoay, Điều chỉnh chiều cao'],
                    ['name' => '[MON] Trọng lượng', 'value' => '6.8kg'],
                ]
            ],
            [
                'name' => 'Màn Hình Dell E2722H',
                'category_id' => 4,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'Dell'],
                    ['name' => 'Model', 'value' => 'MODE0154'],
                    ['name' => 'Price', 'value' => '4790000'],
                    ['name' => 'Deal Price', 'value' => '4290000'],
                    ['name' => 'Rating', 'value' => '4'],
                    ['name' => 'On Top', 'value' => '1'],
                    ['name' => 'Sale Price', 'value' => '3990000'],
                    ['name' => 'Sale Start Date', 'value' => '2024-11-10'],
                    ['name' => 'Sale End Date', 'value' => '2024-11-20'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/monitors/Dell/10/Thumb.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/monitors/Dell/10/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/monitors/Dell/10/Image1.jpg'],
                    ['name' => '[MON] Kiểu dáng màn hình', 'value' => 'Phẳng'],
                    ['name' => '[MON] Tỉ lệ khung hình', 'value' => '16:9'],
                    ['name' => '[MON] Kích thước mặc định', 'value' => '27 inch'],
                    ['name' => '[MON] Công nghệ tấm nền', 'value' => 'IPS'],
                    ['name' => '[MON] Phân giải điểm ảnh', 'value' => 'FHD - 1920 x 1080'],
                    ['name' => '[MON] Độ sáng hiển thị', 'value' => '300 Nits cd/m2'],
                    ['name' => '[MON] Tần số quét', 'value' => '60 Hz'],
                    ['name' => '[MON] Thời gian đáp ứng', 'value' => '8ms'],
                    ['name' => '[MON] Chỉ số màu sắc', 'value' => '16.7 triệu màu'],
                    ['name' => '[MON] Hỗ trợ tiêu chuẩn', 'value' => 'VESA'],
                    ['name' => '[MON] Cổng cắm kết nối', 'value' => '1xHDMI, 1xVGA'],
                    ['name' => '[MON] Phụ kiện trọng hộp', 'value' => 'Dây nguồn, Dây VGA'],
                    ['name' => '[MON] Điện năng tiêu thụ', 'value' => 'Tối đa: 20W'],
                    ['name' => '[MON] Thiết kế cơ học', 'value' => 'Nghiêng'],
                    ['name' => '[MON] Trọng lượng', 'value' => '5.5kg'],
                ]
            ],
            [
                'name' => 'Màn Hình LG UltraGear 27GL850',
                'category_id' => 4,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'LG'],
                    ['name' => 'Model', 'value' => '27GL850'],
                    ['name' => 'Price', 'value' => '9000000'],
                    ['name' => 'Deal Price', 'value' => '8500000'],
                    ['name' => 'Rating', 'value' => '5'],
                    ['name' => 'On Top', 'value' => '1'],
                    ['name' => 'Sale Price', 'value' => '8200000'],
                    ['name' => 'Sale Start Date', 'value' => '2024-11-12'],
                    ['name' => 'Sale End Date', 'value' => '2024-11-25'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/monitors/LG/11/Thumb.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/monitors/LG/11/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/monitors/LG/11/Image1.jpg'],
                    ['name' => '[MON] Kiểu dáng màn hình', 'value' => 'Phẳng'],
                    ['name' => '[MON] Tỉ lệ khung hình', 'value' => '16:9'],
                    ['name' => '[MON] Kích thước mặc định', 'value' => '27 inch'],
                    ['name' => '[MON] Công nghệ tấm nền', 'value' => 'IPS'],
                    ['name' => '[MON] Phân giải điểm ảnh', 'value' => 'QHD - 2560 x 1440'],
                    ['name' => '[MON] Độ sáng hiển thị', 'value' => '350 Nits cd/m2'],
                    ['name' => '[MON] Tần số quét', 'value' => '144 Hz'],
                    ['name' => '[MON] Thời gian đáp ứng', 'value' => '1ms'],
                    ['name' => '[MON] Hỗ trợ tiêu chuẩn', 'value' => 'G-Sync Compatible'],
                    ['name' => '[MON] Cổng cắm kết nối', 'value' => '2xHDMI, 1xDisplayPort'],
                    ['name' => '[MON] Phụ kiện trọng hộp', 'value' => 'Dây nguồn, Dây DisplayPort'],
                    ['name' => '[MON] Trọng lượng', 'value' => '6kg'],
                ]
            ],
            [
                'name' => 'Màn Hình LG UltraWide 34WN80C-B',
                'category_id' => 4,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'LG'],
                    ['name' => 'Model', 'value' => '34WN80C-B'],
                    ['name' => 'Price', 'value' => '11000000'],
                    ['name' => 'Deal Price', 'value' => '10500000'],
                    ['name' => 'Rating', 'value' => '4'],
                    ['name' => 'Sale Price', 'value' => '10000000'],
                    ['name' => 'Sale Start Date', 'value' => '2024-11-15'],
                    ['name' => 'Sale End Date', 'value' => '2024-11-30'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/monitors/LG/12/Thumb.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/monitors/LG/12/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/monitors/LG/12/Image1.jpg'],
                    ['name' => '[MON] Kiểu dáng màn hình', 'value' => 'Cong'],
                    ['name' => '[MON] Tỉ lệ khung hình', 'value' => '21:9'],
                    ['name' => '[MON] Kích thước mặc định', 'value' => '34 inch'],
                    ['name' => '[MON] Công nghệ tấm nền', 'value' => 'IPS'],
                    ['name' => '[MON] Phân giải điểm ảnh', 'value' => 'UWQHD - 3440 x 1440'],
                    ['name' => '[MON] Độ sáng hiển thị', 'value' => '300 Nits cd/m2'],
                    ['name' => '[MON] Tần số quét', 'value' => '75 Hz'],
                    ['name' => '[MON] Cổng cắm kết nối', 'value' => '2xHDMI, 1xDisplayPort, 1xUSB-C'],
                    ['name' => '[MON] Trọng lượng', 'value' => '8kg'],
                ]
            ],
            [
                'name' => 'Màn Hình LG UltraFine 24MD4KL-B',
                'category_id' => 4,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'LG'],
                    ['name' => 'Model', 'value' => '24MD4KL-B'],
                    ['name' => 'Price', 'value' => '14000000'],
                    ['name' => 'Deal Price', 'value' => '13500000'],
                    ['name' => 'Rating', 'value' => '4.5'],
                    ['name' => 'Sale Price', 'value' => '12900000'],
                    ['name' => 'Sale Start Date', 'value' => '2024-11-18'],
                    ['name' => 'Sale End Date', 'value' => '2024-11-28'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/monitors/LG/13/Thumb.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/monitors/LG/13/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/monitors/LG/13/Image1.jpg'],
                    ['name' => '[MON] Kiểu dáng màn hình', 'value' => 'Phẳng'],
                    ['name' => '[MON] Tỉ lệ khung hình', 'value' => '16:9'],
                    ['name' => '[MON] Kích thước mặc định', 'value' => '24 inch'],
                    ['name' => '[MON] Công nghệ tấm nền', 'value' => 'IPS'],
                    ['name' => '[MON] Phân giải điểm ảnh', 'value' => '4K - 3840 x 2160'],
                    ['name' => '[MON] Độ sáng hiển thị', 'value' => '500 Nits cd/m2'],
                    ['name' => '[MON] Cổng cắm kết nối', 'value' => '1xUSB-C'],
                    ['name' => '[MON] Trọng lượng', 'value' => '5kg'],
                ]
            ],
        
            // Sản phẩm BenQ
            [
                'name' => 'Màn Hình BenQ Zowie XL2546',
                'category_id' => 4,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'BenQ'],
                    ['name' => 'Model', 'value' => 'XL2546'],
                    ['name' => 'Price', 'value' => '9000000'],
                    ['name' => 'Deal Price', 'value' => '8800000'],
                    ['name' => 'Rating', 'value' => '5'],
                    ['name' => 'Sale Price', 'value' => '8500000'],
                    ['name' => 'Sale Start Date', 'value' => '2024-11-10'],
                    ['name' => 'Sale End Date', 'value' => '2024-11-22'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/monitors/BenQ/14/Thumb.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/monitors/BenQ/14/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/monitors/BenQ/14/Image1.jpg'],
                    ['name' => '[MON] Kiểu dáng màn hình', 'value' => 'Phẳng'],
                    ['name' => '[MON] Tỉ lệ khung hình', 'value' => '16:9'],
                    ['name' => '[MON] Kích thước mặc định', 'value' => '24.5 inch'],
                    ['name' => '[MON] Công nghệ tấm nền', 'value' => 'TN'],
                    ['name' => '[MON] Phân giải điểm ảnh', 'value' => 'FHD - 1920 x 1080'],
                    ['name' => '[MON] Độ sáng hiển thị', 'value' => '320 Nits cd/m2'],
                    ['name' => '[MON] Tần số quét', 'value' => '240 Hz'],
                    ['name' => '[MON] Thời gian đáp ứng', 'value' => '1ms'],
                    ['name' => '[MON] Trọng lượng', 'value' => '7kg'],
                ]
            ],
            [
                'name' => 'Màn Hình BenQ PD2700U',
                'category_id' => 4,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'BenQ'],
                    ['name' => 'Model', 'value' => 'PD2700U'],
                    ['name' => 'Price', 'value' => '12000000'],
                    ['name' => 'Deal Price', 'value' => '11500000'],
                    ['name' => 'Rating', 'value' => '4.5'],
                    ['name' => 'Sale Price', 'value' => '11000000'],
                    ['name' => 'Sale Start Date', 'value' => '2024-11-15'],
                    ['name' => 'Sale End Date', 'value' => '2024-11-27'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/monitors/BenQ/15/Thumb.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/monitors/BenQ/15/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/monitors/BenQ/15/Image1.jpg'],
                    ['name' => '[MON] Tỉ lệ khung hình', 'value' => '16:9'],
                    ['name' => '[MON] Kích thước mặc định', 'value' => '27 inch'],
                    ['name' => '[MON] Công nghệ tấm nền', 'value' => 'IPS'],
                    ['name' => '[MON] Phân giải điểm ảnh', 'value' => '4K - 3840 x 2160'],
                    ['name' => '[MON] Độ sáng hiển thị', 'value' => '350 Nits cd/m2'],
                    ['name' => '[MON] Cổng cắm kết nối', 'value' => '1xHDMI, 1xDisplayPort, 1xMini DisplayPort'],
                    ['name' => '[MON] Trọng lượng', 'value' => '6kg'],
                ]
            ],
            [
                'name' => 'Màn Hình BenQ EX3203R',
                'category_id' => 4,
                'attributes' => [
                    ['name' => 'Brand', 'value' => 'BenQ'],
                    ['name' => 'Model', 'value' => 'EX3203R'],
                    ['name' => 'Price', 'value' => '14000000'],
                    ['name' => 'Deal Price', 'value' => '13500000'],
                    ['name' => 'Rating', 'value' => '4.5'],
                    ['name' => 'Sale Price', 'value' => '13000000'],
                    ['name' => 'Sale Start Date', 'value' => '2024-11-18'],
                    ['name' => 'Sale End Date', 'value' => '2024-11-28'],
                    ['name' => 'Thumbnail', 'value' => '/assets/img/products/monitors/BenQ/16/Thumb.jpg'],
                    ['name' => 'Thumbnail Small', 'value' => '/assets/img/products/monitors/BenQ/16/Thumb.jpg'],
                    ['name' => 'Image1', 'value' => '/assets/img/products/monitors/BenQ/16/Image1.jpg'],
                    ['name' => '[MON] Kiểu dáng màn hình', 'value' => 'Cong'],
                    ['name' => '[MON] Tỉ lệ khung hình', 'value' => '16:9'],
                    ['name' => '[MON] Kích thước mặc định', 'value' => '31.5 inch'],
                    ['name' => '[MON] Công nghệ tấm nền', 'value' => 'VA'],
                    ['name' => '[MON] Phân giải điểm ảnh', 'value' => 'QHD - 2560 x 1440'],
                    ['name' => '[MON] Độ sáng hiển thị', 'value' => '400 Nits cd/m2'],
                    ['name' => '[MON] Tần số quét', 'value' => '144 Hz'],
                    ['name' => '[MON] Cổng cắm kết nối', 'value' => '2xHDMI, 1xDisplayPort, 1xUSB-C'],
                    ['name' => '[MON] Trọng lượng', 'value' => '8kg'],
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
