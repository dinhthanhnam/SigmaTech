<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Laptop;
use Illuminate\Http\Request;
use App\Http\Resources\LaptopResource;

class LaptopController extends Controller
{
    /**
     * Lấy danh sách tất cả laptop
     */
    public function index(Request $request) {
        $laptops = Laptop::all();

        if ($laptops->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Không có bản ghi nào.',
                'data' => []
            ], 404); // Trả về mã 404 nếu không có dữ liệu
        }

        return response()->json([
            'success' => true,
            'message' => 'Danh sách laptop được lấy thành công.',
            'data' => LaptopResource::collection($laptops)
        ], 200);
    }

    /**
     * Tạo mới một laptop
     */
    public function store(Request $request) {
        // Xử lý logic thêm laptop ở đây
    }

    /**
     * Lấy chi tiết một laptop theo id
     */
    public function show($id) {
        $laptop = Laptop::find($id);

        if (!$laptop) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy laptop.',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Thông tin laptop được lấy thành công.',
            'data' => new LaptopResource($laptop)
        ], 200);
    }

    /**
     * Cập nhật một laptop
     */
    public function update(Request $request, $id) {
        // Xử lý logic cập nhật laptop ở đây
    }

    /**
     * Xóa một laptop
     */
    public function destroy($id) {
        // Xử lý logic xóa laptop ở đây
    }
}
