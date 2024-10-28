<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;

class LaptopController extends Controller
{
    public function show($id)
    {
        // Lấy laptop theo id và kèm theo các thuộc tính (attributes) của nó
        $laptop = Laptop::with('attributes')->findOrFail($id);

        // Trả về view hoặc dữ liệu JSON, ở đây trả về view cho ví dụ
        return view('single-laptop', compact('laptop'));
    }
}

