<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accessory;
class AccessoryController extends Controller
{
    public function show($brand, $id)
    {
        // Lấy gpu theo id và kèm theo các thuộc tính của nó
        $accessory = Accessory::with('attributes')->findOrFail($id);

        // Tìm attribute 'Brand' và 'Type' của gpu
        $accessoryBrand = optional($accessory->attributes->where('name', 'Brand')->first())->pivot->value;
        // $gpuType = optional($gpu->attributes->where('name', '[CPU] Loại gpu')->first())->pivot->value;

        // Kiểm tra xem các thông tin brand và type từ URL có khớp với dữ liệu của gpu không
        if ($accessoryBrand !== $brand) {
            abort(404); // Không tìm thấy nếu thông tin không khớp
        }

        // Trả về view cùng với các dữ liệu cần thiết
        return view('single.single-accessory', compact('accessoryBrand', 'accessory'));
    }
    public function showAccessories()
    {
        $accessories = Accessory::with('attributes')->paginate(12);
        $topAccessories = Accessory::whereHas('attributes', function ($query) {
            $query->where('name', 'On Top')
                  ->where('value', '1');
        })
        ->with('attributes')
        ->limit(10)
        ->get();

        foreach($accessories as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $item->link = 'accessories/'.$brand.'/'.$item->id;
        };

        foreach($topAccessories as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $item->link = 'accessory/'.$brand.'/'.$item->id;
        };
        
        foreach($accessories as $item) {
            $brand = $item->attributes->where('name', 'Brand')->first()->pivot->value;
            $item->link = 'accessory/'.$brand.'/'.$item->id;
        };
        
        return view('categories.accessories', compact('accessories', 'topAccessories'));
    }

    public function filterAccessories(Request $request)
    {
        $filters = [
            'brand' => $request->input('brand'),
            'price_min' => $request->input('min'),
            'price_max' => $request->input('max'),
        ];

        $accessories = Accessory::query();
        
        if (!empty($filters['brand'])) {
            $accessories->whereHas('attributes', function ($query) use ($filters) {
                $query->where('name', 'Brand')
                    ->where('value', $filters['brand']);
            });
        }

        if (!empty($filters['price_min']) || !empty($filters['price_max'])) {
            $minPrice = $filters['price_min'] ?? 0;
            $maxPrice = $filters['price_max'] ?? PHP_INT_MAX;

            $accessories->whereHas('attributes', function ($query) use ($minPrice, $maxPrice) {
                $query->where('name', 'Price')
                    ->whereBetween('value', [$minPrice, $maxPrice]);
            });
        }

        // Phân trang kết quả và trả về view
        $accessories = $accessories->with('attributes')->paginate(12);

        return view('categories.filtered-accessories', compact('accessories', 'filters'));
    }
}