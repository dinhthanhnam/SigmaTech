<?php

namespace App\Http\Controllers;

use App\Models\Cpu;

class CpuController extends Controller
{
    public function show($pcpart_type, $brand, $id)
{
    // Lấy cpu theo id, chỉ nếu nó có attribute 'Loại linh kiện' là 'cpu'
    $cpu = Cpu::whereHas('attributes', function ($query) {
        $query->where('name', 'Loại linh kiện')->where('value', 'CPU');
    })->with('attributes')->findOrFail($id);

    // Tìm attribute 'Brand' và 'Type' của cpu
    $cpuBrand = optional($cpu->attributes->where('name', 'Brand')->first())->pivot->value;
    $pcpartType = optional($cpu->attributes->where('name', 'Loại linh kiện')->first())->pivot->value;

    // Kiểm tra xem các thông tin brand và type từ URL có khớp với dữ liệu của cpu không
    if (strtolower($cpuBrand) !== strtolower($brand) || strtolower($pcpartType) !== strtolower($pcpart_type)) {
        abort(404); // Không tìm thấy nếu thông tin không khớp
    }

    // Trả về view cùng với các dữ liệu cần thiết
    return view('single.single-cpu', compact('pcpartType', 'cpuBrand', 'cpu'));
}

    public function showCpus()
    {
        $topCpus = Cpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Loại linh kiện')
                  ->where('value', 'CPU');
        })
        ->whereHas('attributes', function ($query) {
            $query->where('name', 'On Top')
                  ->where('value', '1');
        })
        ->with('attributes')
        ->limit(10)->get();

        foreach($topCpus as $item)
        {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $type = $item->attributes->firstWhere('name', 'Loại linh kiện')->pivot->value ?? 'N/A';
            $item->link = 'pc-parts/'.$type.'/'.$brand.'/'.$item->id;
        };

        $cpus = Cpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Loại linh kiện')
                  ->where('value', 'CPU');
        })->paginate(12);

        foreach($cpus as $item)
        {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $type = $item->attributes->firstWhere('name', 'Loại linh kiện')->pivot->value ?? 'N/A';
            $item->link = 'pc-parts/'.$type.'/'.$brand.'/'.$item->id;
        };


        return view('categories.cpus', compact('cpus', 'topCpus'));
    }
}

