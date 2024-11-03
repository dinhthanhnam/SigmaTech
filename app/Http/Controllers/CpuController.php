<?php

namespace App\Http\Controllers;

use App\Models\Cpu;

class CpuController extends Controller
{
    public function show( $pcpart_type,$brand, $id)
    {
        // Lấy cpu theo id và kèm theo các thuộc tính của nó
        $cpu = Cpu::with('attributes')->findOrFail($id);

        // Tìm attribute 'Brand' và 'Type' của cpu
        $cpuBrand = optional($cpu->attributes->where('name', 'Brand')->first())->pivot->value;
        
        $pcpartType = optional($cpu->attributes->where('name', 'Loại linh kiện')->first())->pivot->value;
        // Kiểm tra xem các thông tin brand và type từ URL có khớp với dữ liệu của cpu không
        if (strtolower($cpuBrand) !== strtolower($brand) || strtolower($pcpartType) !== strtolower($pcpart_type)) {
            abort(404); // Không tìm thấy nếu thông tin không khớp
        }

        // Trả về view cùng với các dữ liệu cần thiết
        return view('single.single-cpu', compact('pcpartType','cpuBrand',  'cpu'));
    }
    public function showCpus()
    {
        $cpus = Cpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Loại linh kiện')
                  ->where('value', 'CPU');
        })->with('attributes')->get();
        return view('categories.cpus', compact('cpus'));
    }

}

