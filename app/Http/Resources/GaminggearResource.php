<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GaminggearResource extends JsonResource
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
            'category_name' => 'laptops',
            'brand' => $this->attributes->firstWhere('name', 'Brand')?->pivot->value,
            'model' => $this->attributes->firstWhere('name', 'Model')?->pivot->value,
            'price' => $this->attributes->firstWhere('name', 'Price')?->pivot->value ?? 'N/A',
            'deal_price' => $this->attributes->firstWhere('name', 'Deal Price')?->pivot->value ?? 'N/A',
            'sale_price' => $this->attributes->firstWhere('name', 'Sale Price')?->pivot->value ?? 'N/A',
            'sale_end_date' => $this->attributes->firstWhere('name', 'Sale End Date')?->pivot->value ?? 'N/A',
            'device_type' => $this->attributes->firstWhere('name', '[Laptop] Vi xử lý')?->pivot->value ?? 'N/A',
            'connectivity' => $this->attributes->firstWhere('name', '[Laptop] Card đồ hoạ')?->pivot->value ?? 'N/A',
            'rgb_system' => $this->attributes->firstWhere('name', '[Laptop] Dung lượng RAM')?->pivot->value ?? 'N/A',
            'material' => $this->attributes->firstWhere('name', '[Laptop] Ổ cứng')?->pivot->value ?? 'N/A',
            'weight' => $this->attributes->firstWhere('name', '[Laptop] Kích thước màn hình')?->pivot->value ?? 'N/A',
            'special_features' => $this->attributes->firstWhere('name', '[Laptop] Độ phân giải')?->pivot->value ?? 'N/A',
            'ports' => $this->attributes->firstWhere('name', '[Laptop] Màu sắc')?->pivot->value ?? 'N/A',
            'thumbnail' => $this->attributes->firstWhere('name', 'Thumbnail')?->pivot->value ?? 'N/A',
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
