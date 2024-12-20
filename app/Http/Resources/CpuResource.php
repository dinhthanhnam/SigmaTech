<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CpuResource extends JsonResource
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
            'category_name' => 'cpus',
            'brand' => $this->attributes->firstWhere('name', 'Brand')?->pivot->value,
            'model' => $this->attributes->firstWhere('name', 'Model')?->pivot->value,
            'laptop_type' => $this->attributes->firstWhere('name', '[Laptop] Loại laptop')?->pivot->value ?? 'N/A',
            'price' => $this->attributes->firstWhere('name', 'Price')?->pivot->value ?? 'N/A',
            'deal_price' => $this->attributes->firstWhere('name', 'Deal Price')?->pivot->value ?? 'N/A',
            'sale_price' => $this->attributes->firstWhere('name', 'Sale Price')?->pivot->value ?? 'N/A',
            'sale_end_date' => $this->attributes->firstWhere('name', 'Sale End Date')?->pivot->value ?? 'N/A',
            'socket' => $this->attributes->firstWhere('name', '[CPU] Socket')?->pivot->value ?? 'N/A',
            'base_clock' => $this->attributes->firstWhere('name', '[CPU] Tốc độ cơ bản')?->pivot->value ?? 'N/A',
            'max_clock' => $this->attributes->firstWhere('name', '[CPU] Tốc độ tối đa')?->pivot->value ?? 'N/A',
            'core_count' => $this->attributes->firstWhere('name', '[CPU] Nhân CPU')?->pivot->value ?? 'N/A',
            'thread_count' => $this->attributes->firstWhere('name', '[CPU] Luồng CPU')?->pivot->value ?? 'N/A',
            'p_core_count' => $this->attributes->firstWhere('name', '[CPU] Số P-core')?->pivot->value ?? 'N/A',
            'e_core_count' => $this->attributes->firstWhere('name', '[CPU] Số E-core')?->pivot->value ?? 'N/A',
            'supported_memory' => $this->attributes->firstWhere('name', '[CPU] Bộ nhớ hỗ trợ')?->pivot->value ?? 'N/A',
            'max_memory_size' => $this->attributes->firstWhere('name', '[CPU] Kích thước bộ nhớ tối đa')?->pivot->value ?? 'N/A',
            'max_memory_channels' => $this->attributes->firstWhere('name', '[CPU] Số kênh bộ nhớ tối đa')?->pivot->value ?? 'N/A',
            'max_power_draw' => $this->attributes->firstWhere('name', '[CPU] Điện áp tiêu thụ tối đa')?->pivot->value ?? 'N/A',
            'base_power' => $this->attributes->firstWhere('name', '[CPU] Công suất cơ bản')?->pivot->value ?? 'N/A',
            'features' => $this->attributes->firstWhere('name', '[CPU] Tính năng')?->pivot->value ?? 'N/A',
            'lithography' => $this->attributes->firstWhere('name', '[CPU] Thuật in thạch bản')?->pivot->value ?? 'N/A',
            'image1' => $this->attributes->firstWhere('name', 'Image1')?->pivot->value ?? 'N/A',
            'image2' => $this->attributes->firstWhere('name', 'Image2')?->pivot->value ?? 'N/A',
            'image3' => $this->attributes->firstWhere('name', 'Image3')?->pivot->value ?? 'N/A',
            'image4' => $this->attributes->firstWhere('name', 'Image4')?->pivot->value ?? 'N/A',
            'image5' => $this->attributes->firstWhere('name', 'Image5')?->pivot->value ?? 'N/A',
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
