<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gaminggear;
class GaminggearController extends Controller
{
    public function show($brand, $id)
    {
        // Lấy gpu theo id và kèm theo các thuộc tính của nó
        $gaminggear = Gaminggear::with('attributes')->findOrFail($id);

        // Tìm attribute 'Brand' và 'Type' của gpu
        $gaminggearBrand = optional($gaminggear->attributes->where('name', 'Brand')->first())->pivot->value;
        // $gpuType = optional($gpu->attributes->where('name', '[CPU] Loại gpu')->first())->pivot->value;

        // Kiểm tra xem các thông tin brand và type từ URL có khớp với dữ liệu của gpu không
        if ($gaminggearBrand !== $brand) {
            abort(404); // Không tìm thấy nếu thông tin không khớp
        }

        // Trả về view cùng với các dữ liệu cần thiết
        return view('single.single-gaminggear', compact('gaminggearBrand', 'gaminggear'));
    }
    public function showGaminggears()
    {
        $gaminggears = Gaminggear::with('attributes')->paginate(12);
        $topGaminggears = Gaminggear::whereHas('attributes', function ($query) {
            $query->where('name', 'On Top')
                  ->where('value', '1');
        })
        ->with('attributes')
        ->limit(10)
        ->get();

        foreach($gaminggears as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $item->link = 'gaminggears/'.$brand.'/'.$item->id;
        };

        foreach($topGaminggears as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $item->link = 'gaminggears/'.$brand.'/'.$item->id;
        };
        
        foreach($gaminggears as $item) {
            $brand = $item->attributes->where('name', 'Brand')->first()->pivot->value;
            $item->link = 'gaminggears/'.$brand.'/'.$item->id;
        };
        return view('categories.gaming-gears', compact('gaminggears', 'topGaminggears'));
    }

    public function filterGaminggears(Request $request)
    {
        $filters = [
            'brand' => $request->input('brand'),
            'price_min' => $request->input('min'),
            'price_max' => $request->input('max'),
        ];

        $gaminggears = Gaminggear::query();
        
        if (!empty($filters['brand'])) {
            $gaminggears->whereHas('attributes', function ($query) use ($filters) {
                $query->where('name', 'Brand')
                    ->where('value', $filters['brand']);
            });
        }

        if (!empty($filters['price_min']) || !empty($filters['price_max'])) {
            $minPrice = $filters['price_min'] ?? 0;
            $maxPrice = $filters['price_max'] ?? PHP_INT_MAX;

            $gaminggears->whereHas('attributes', function ($query) use ($minPrice, $maxPrice) {
                $query->where('name', 'Price')
                    ->whereBetween('value', [$minPrice, $maxPrice]);
            });
        }

        // Phân trang kết quả và trả về view
        $gaminggears = $gaminggears->with('attributes')->paginate(12);

        return view('categories.filtered-gaminggears', compact('gaminggears', 'filters'));
    }
}
