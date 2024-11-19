<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Pagination\LengthAwarePaginator;

class SliderController extends Controller
{
    public function showAllSliders()
    {
        // Lấy tất cả các bản ghi từ bảng sliders, chỉ lấy các cột id, name, và image
        $sliders = Slider::select('id', 'name', 'image')->get();

        // Thiết lập phân trang
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 20; // Số lượng bản ghi trên mỗi trang
        $items = $sliders->slice(($currentPage - 1) * $perPage, $perPage);

        // Tạo LengthAwarePaginator cho dữ liệu đã slice
        $paginatedSliders = new LengthAwarePaginator(
            $items,
            $sliders->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()] // Đảm bảo đường dẫn đúng
        );

        // Truyền dữ liệu sang view admin.slider
        return view('admin.slider', compact('sliders', 'paginatedSliders'));
    }

    public function showAddSlider()
    {
        return view('admin.new-slider');
    }

    public function saveSlider(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Chỉ cho phép ảnh và kích thước tối đa 2MB
        ]);

        // Đường dẫn thư mục lưu trữ
        $destinationPath = public_path('assets/img/banner/Slider');

        // Lấy tên file gốc và thêm timestamp để tránh trùng lặp
        $imageName = $request->file('image')->getClientOriginalName();

        // Lưu file vào thư mục
        $request->file('image')->move($destinationPath, $imageName);

        // Lưu thông tin slider vào database (chỉ lưu đường dẫn tương đối)
        Slider::create([
            'name' => $request->name,
            'image' => 'assets/img/banner/Slider/' . $imageName,
        ]);

        return redirect()->route('admin.show-slider')->with('success', 'Slider đã được thêm thành công.');
    }

}

