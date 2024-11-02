<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;

class LaptopController extends Controller
{
    public function index()
    {
        // Lấy tất cả các laptop cùng với các thuộc tính của chúng
        $laptops = Laptop::with('attributes')->get();
    
        // Trả về view trang chủ với danh sách laptop
        return view('index', compact('laptops'));
    }

    public function show($type, $brand, $id)
    {
        // Lấy laptop theo id và kèm theo các thuộc tính của nó
        $laptop = Laptop::with('attributes')->findOrFail($id);

        // Tìm attribute 'Brand' và 'Type' của laptop
        $laptopBrand = optional($laptop->attributes->where('name', 'Brand')->first())->pivot->value;
        $laptopType = optional($laptop->attributes->where('name', '[Laptop] Loại laptop')->first())->pivot->value;
        // Kiểm tra xem các thông tin brand và type từ URL có khớp với dữ liệu của laptop không
        if (strtolower($laptopBrand) !== strtolower($brand) || strtolower($laptopType) !== strtolower($type)) {
            abort(404); // Không tìm thấy nếu thông tin không khớp
        }
        // Trả về view cùng với các dữ liệu cần thiết
        return view('single.single-laptop', compact('laptopType', 'laptopBrand', 'laptop'));
    }
    public function showGaminglaptops()
    {
        $gamingLaptops = Laptop::whereHas('attributes', function ($query) {
            $query->where('name', '[Laptop] Loại laptop')
                  ->where('value', 'Gaming');
        })->with('attributes')->get();
        
        return view('categories.gaming-laptops', compact('gamingLaptops'));
    }

    public function showOfficeLaptops()
    {
        $officeLaptops = Laptop::whereHas('attributes', function ($query) {
            $query->where('name', '[Laptop] Loại laptop')
                  ->where('value', 'Office');
        })->with('attributes')->get();
        
        return view('categories.office-laptops', compact('officeLaptops'));
    }
}

