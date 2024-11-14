<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gpu;

class GpuController extends Controller
{
    public function show( $pcpart_type,$brand, $id)
    {
        // Lấy gpu theo id và kèm theo các thuộc tính của nó
        $gpu = Gpu::with('attributes')->findOrFail($id);

        // Tìm attribute 'Brand' và 'Type' của gpu
        $gpuBrand = optional($gpu->attributes->where('name', 'Brand')->first())->pivot->value;
        
        $pcpartType = optional($gpu->attributes->where('name', 'Loại linh kiện')->first())->pivot->value;
        // Kiểm tra xem các thông tin brand và type từ URL có khớp với dữ liệu của gpu không
        if (strtolower($gpuBrand) !== strtolower($brand) || strtolower($pcpartType) !== strtolower($pcpart_type)) {
            abort(404); // Không tìm thấy nếu thông tin không khớp
        }

        // Trả về view cùng với các dữ liệu cần thiết
        return view('single.single-gpu', compact('pcpartType','gpuBrand',  'gpu'));
    }

    public function showGpus()
    {
        $Gpus = Gpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Loại linh kiện')
                  ->where('value', 'GPU');
        })->paginate(12);

        return view('categories.gpus', compact('gpus'));
    }
}

