<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cooling;
class CoolingController extends Controller
{
    public function show($brand, $id)
    {
        // Lấy gpu theo id và kèm theo các thuộc tính của nó
        $cooling = Cooling::with('attributes')->findOrFail($id);

        // Tìm attribute 'Brand' và 'Type' của gpu
        $coolingBrand = optional($cooling->attributes->where('name', 'Brand')->first())->pivot->value;
        // $gpuType = optional($gpu->attributes->where('name', '[CPU] Loại gpu')->first())->pivot->value;

        // Kiểm tra xem các thông tin brand và type từ URL có khớp với dữ liệu của gpu không
        if ($coolingBrand !== $brand) {
            abort(404); // Không tìm thấy nếu thông tin không khớp
        }

        // Trả về view cùng với các dữ liệu cần thiết
        return view('single.single-cooling', compact('coolingBrand', 'cooling'));
    }
    public function showCoolings()
    {
        $coolings = Cooling::with('attributes')->paginate(12);
        $topCoolings = Cooling::whereHas('attributes', function ($query) {
            $query->where('name', 'On Top')
                  ->where('value', '1');
        })
        ->with('attributes')
        ->limit(10)
        ->get();

        foreach($coolings as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $item->link = 'coolings/'.$brand.'/'.$item->id;
        };

        foreach($topCoolings as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $item->link = 'coolings/'.$brand.'/'.$item->id;
        };
        
        foreach($coolings as $item) {
            $brand = $item->attributes->where('name', 'Brand')->first()->pivot->value;
            $item->link = 'coolings/'.$brand.'/'.$item->id;
        };
        
        return view('categories.coolings', compact('coolings', 'topCoolings'));
    }

}
