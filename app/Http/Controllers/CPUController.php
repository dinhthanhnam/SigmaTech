<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cpu;

class CpuController extends Controller
{
    public function show($brand, $id)
    {
        // Lấy cpu theo id và kèm theo các thuộc tính của nó
        $cpu = Cpu::with('attributes')->findOrFail($id);

        // Tìm attribute 'Brand' và 'Type' của cpu
        $cpuBrand = optional($cpu->attributes->where('name', 'Brand')->first())->pivot->value;
        // $cpuType = optional($cpu->attributes->where('name', '[CPU] Loại cpu')->first())->pivot->value;

        // Kiểm tra xem các thông tin brand và type từ URL có khớp với dữ liệu của cpu không
        if ($cpuBrand !== $brand) {
            abort(404); // Không tìm thấy nếu thông tin không khớp
        }

        // Trả về view cùng với các dữ liệu cần thiết
        return view('single.single-cpu', compact('cpuBrand', 'cpu'));
    }
}

