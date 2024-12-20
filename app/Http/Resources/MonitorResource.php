<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MonitorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category_id' => $this->category_id,
            'category_name' => 'monitors',
            'brand' => $this->attributes->firstWhere('name', 'Brand')?->pivot->value,
            'model' => $this->attributes->firstWhere('name', 'Model')?->pivot->value,
            'laptop_type' => $this->attributes->firstWhere('name', '[Laptop] Loại laptop')?->pivot->value ?? 'N/A',
            'price' => $this->attributes->firstWhere('name', 'Price')?->pivot->value ?? 'N/A',
            'deal_price' => $this->attributes->firstWhere('name', 'Deal Price')?->pivot->value ?? 'N/A',
            'sale_price' => $this->attributes->firstWhere('name', 'Sale Price')?->pivot->value ?? 'N/A',
            'sale_end_date' => $this->attributes->firstWhere('name', 'Sale End Date')?->pivot->value ?? 'N/A',
            'mon_shape' => $this->attributes->firstWhere('name', '[MON] Kiểu dáng màn hình')?->pivot->value ?? 'N/A',
            'mon_ratio' => $this->attributes->firstWhere('name', '[MON] Tỉ lệ khung hình')?->pivot->value ?? 'N/A',
            'mon_size' => $this->attributes->firstWhere('name', '[MON] Kích thước mặc định')?->pivot->value ?? 'N/A',
            'mon_panel' => $this->attributes->firstWhere('name', '[MON] Công nghệ tấm nền')?->pivot->value ?? 'N/A',
            'mon_resolution' => $this->attributes->firstWhere('name', '[MON] Phân giải điểm ảnh')?->pivot->value ?? 'N/A',
            'mon_brightness' => $this->attributes->firstWhere('name', '[MON] Độ sáng hiển thị')?->pivot->value ?? 'N/A',
            'mon_refreshrate' => $this->attributes->firstWhere('name', '[MON] Tần số quét')?->pivot->value ?? 'N/A',
            'mon_respond' => $this->attributes->firstWhere('name', '[MON] Thời gian đáp ứng')?->pivot->value ?? 'N/A',
            'mon_color' => $this->attributes->firstWhere('name', '[MON] Chỉ số màu sắc')?->pivot->value ?? 'N/A',
            'mon_standards' => $this->attributes->firstWhere('name', '[MON] Hỗ trợ tiêu chuẩn')?->pivot->value ?? 'N/A',
            'mon_ports' => $this->attributes->firstWhere('name', '[MON] Cổng cắm kết nối')?->pivot->value ?? 'N/A',
            'mon_accessories' => $this->attributes->firstWhere('name', '[MON] Phụ kiện trọng hộp')?->pivot->value ?? 'N/A',
            'mon_powerconsumption' => $this->attributes->firstWhere('name', '[MON] Điện năng tiêu thụ')?->pivot->value ?? 'N/A',
            'mon_mechanicaldesign' => $this->attributes->firstWhere('name', '[MON] Thiết kế cơ học')?->pivot->value ?? 'N/A',
            'mon_audiofeature' => $this->attributes->firstWhere('name', '[MON] Tính năng âm thanh')?->pivot->value ?? 'N/A',
            'mon_weight' => $this->attributes->firstWhere('name', '[MON] Trọng lượng')?->pivot->value ?? 'N/A',
            'image1' => $this->attributes->firstWhere('name', 'Image1')?->pivot->value ?? 'N/A',
            'image2' => $this->attributes->firstWhere('name', 'Image2')?->pivot->value ?? 'N/A',
            'image3' => $this->attributes->firstWhere('name', 'Image3')?->pivot->value ?? 'N/A',
            'image4' => $this->attributes->firstWhere('name', 'Image4')?->pivot->value ?? 'N/A',
            'image5' => $this->attributes->firstWhere('name', 'Image5')?->pivot->value ?? 'N/A',
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    //     $monitor_id = $monitor->id;
    // $name = $monitor->name;
    // $type = $monitor->attributes->firstWhere('name', '[Laptop] Loại monitor')->pivot->value ?? 'N/A';
    // $price = $monitor->attributes->firstWhere('name', 'Price')->pivot->value ?? 'N/A';

    // $dealprice = $monitor->attributes->firstWhere('name', 'Deal Price')->pivot->value ?? 'N/A';
    // $rating = $monitor->attributes->firstWhere('name', 'Rating')->pivot->value ?? 'N/A';
    // $brand = $monitor->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
    // $model = $monitor->attributes->firstWhere('name', 'Model')->pivot->value ?? 'N/A';
    // $mon_shape = $monitor->attributes->firstWhere('name', '[MON] Kiểu dáng màn hình')->pivot->value ?? 'N/A';
    // $mon_ratio = $monitor->attributes->firstWhere('name', '[MON] Tỉ lệ khung hình')->pivot->value ?? 'N/A';
    // $mon_size = $monitor->attributes->firstWhere('name', '[MON] Kích thước mặc định')->pivot->value ?? 'N/A';
    // $mon_panel = $monitor->attributes->firstWhere('name', '[MON] Công nghệ tấm nền')->pivot->value ?? 'N/A';
    // $mon_resolution = $monitor->attributes->firstWhere('name', '[MON] Phân giải điểm ảnh')->pivot->value ?? 'N/A';
    // $mon_brightness = $monitor->attributes->firstWhere('name', '[MON] Độ sáng hiển thị')->pivot->value ?? 'N/A';
    // $mon_refreshrate = $monitor->attributes->firstWhere('name', '[MON] Tần số quét')->pivot->value ?? 'N/A';
    // $mon_respond = $monitor->attributes->firstWhere('name', '[MON] Thời gian đáp ứng')->pivot->value ?? 'N/A';
    // $mon_color = $monitor->attributes->firstWhere('name', '[MON] Chỉ số màu sắc')->pivot->value ?? 'N/A';
    // $mon_standards = $monitor->attributes->firstWhere('name', '[MON] Hỗ trợ tiêu chuẩn')->pivot->value ?? 'N/A';
    // $mon_ports = $monitor->attributes->firstWhere('name', '[MON] Cổng cắm kết nối')->pivot->value ?? 'N/A';
    // $mon_accessories = $monitor->attributes->firstWhere('name', '[MON] Phụ kiện trọng hộp')->pivot->value ?? 'N/A';
    // $mon_powerconsumption = $monitor->attributes->firstWhere('name', '[MON] Điện năng tiêu thụ')->pivot->value ?? 'N/A';
    // $mon_mechanicaldesign = $monitor->attributes->firstWhere('name', '[MON] Thiết kế cơ học')->pivot->value ?? 'N/A';
    // $mon_audiofeature = $monitor->attributes->firstWhere('name', '[MON] Tính năng âm thanh')->pivot->value ?? 'N/A';
    // $mon_weight = $monitor->attributes->firstWhere('name', '[MON] Trọng lượng')->pivot->value ?? 'N/A';

    // $saleprice = $monitor->attributes->firstWhere('name', 'Sale Price')->pivot->value ?? 'N/A';
    // $sale_start_date = $monitor->attributes->firstWhere('name', 'Sale Start Date')->pivot->value ?? 'N/A';
    // $sale_end_date = $monitor->attributes->firstWhere('name', 'Sale End Date')->pivot->value ?? 'N/A';
    // $sale_end_time = strtotime($sale_end_date);
    }
}
