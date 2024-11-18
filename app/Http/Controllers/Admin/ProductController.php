<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Cpu;
use App\Models\Gpu;
use App\Models\Monitor;
use App\Models\Attribute;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    // Controller
    public function showAllProducts()
    {
        $laptops = Laptop::with(['attributes', 'categories'])
            ->get()
            ->each(function ($item) {
                $item->setAttribute('data_table', 'laptop');
            });

        $cpus = CPU::with(['attributes', 'categories'])
            ->get()
            ->each(function ($item) {
                $item->setAttribute('data_table', 'cpu');
            });

        $gpus = GPU::with(['attributes', 'categories'])
            ->get()
            ->each(function ($item) {
                $item->setAttribute('data_table', 'gpu');
            });
        $monitors = Monitor::with(['attributes', 'categories'])
            ->get()
            ->each(function ($item) {
                $item->setAttribute('data_table', 'monitor');
            });

        // Gộp tất cả các sản phẩm vào một biến chung
        $products = collect()->merge($laptops)->merge($cpus)->merge($gpus)->merge($monitors);

        return view('admin.product', compact('products'));
    }


    public function showAddProduct()
    {
        return view('admin.new-product');
    }

    public function saveProduct(Request $request)
    {
        $request->validate([
            'nhan' => 'required|integer|min:1', 
            'luong' => 'required|integer|min:1',  
            'price' => 'required|integer|min:1', 
            'dealprice' => 'required|integer|min:1', 
        ]);
        $productType = $request->input('producttype');
        $laptopType = $request->input('laptoptype');
        $maxId = Laptop::max('id');
        $ontop = $request->ontop === 'yes' ? 1 : 0;

        if($laptopType == "laptopGaming"){
            $categoryId = 1;
            $laptopType = "Gaming";
        }
        else if($laptopType == "laptopOffice"){
            $categoryId = 2;
            $laptopType = "Office";
        }
        if ($productType == 'laptop') {
            // Lưu sản phẩm vào bảng laptops
            $laptop = Laptop::create([
                'name' => $request->input('name'),
                'category_id' => $categoryId
            ]);
            if ($productType == "laptop" && $laptopType == "Gaming"){
                $valuePath = "assets/img/products/laptops/gaming/" . ($maxId + 1);
                $folderPath = public_path($valuePath);
            }
            else if ($productType == "laptop" && $laptopType == "Office"){
                $valuePath = "assets/img/products/laptops/office/" . ($maxId + 1);
                $folderPath = public_path($valuePath);
            }
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, 0755, true);
            }

            $attributes = [
                ['name' => 'Brand', 'value' => $request->input('brand')],
                ['name' => 'Model', 'value' => $request->input('model')],
                ['name' => 'Price', 'value' => $request->input(key: 'price')],
                ['name' => 'Deal Price', 'value' => $request->input(key: 'dealprice')],
                ['name' => 'On Top', 'value' => $ontop],
                ['name' => '[Laptop] Loại laptop', 'value' => $laptopType],
                ['name' => '[Laptop] Vi xử lý', 'value' => $request->input(key: 'vixuly')],
                ['name' => '[Laptop] Số nhân', 'value' => $request->input(key: 'nhan')],
                ['name' => '[Laptop] Số luồng', 'value' => $request->input(key: 'luong')],
                ['name' => '[Laptop] Tốc độ tối đa', 'value' => $request->input(key: 'tocdo')],
                ['name' => '[Laptop] Bộ nhớ đệm', 'value' => $request->input(key: 'dem')],
                ['name' => '[Laptop] Card đồ họa', 'value' => $request->input(key: 'card')],
                ['name' => '[Laptop] Kích thước màn hình', 'value' => $request->input(key: 'sizeman')],
                ['name' => '[Laptop] Độ phân giải', 'value' => $request->input(key: 'dophangiai')],
                ['name' => '[Laptop] Tần số quét', 'value' => $request->input(key: 'hz')],
                ['name' => '[Laptop] Công nghệ màn hình', 'value' => $request->input(key: 'cnman')],
                ['name' => '[Laptop] Dung lượng RAM', 'value' => $request->input(key: 'ram')],
                ['name' => '[Laptop] Loại RAM', 'value' => $request->input(key: 'ramtype')],
                ['name' => '[Laptop] Bus RAM', 'value' => $request->input(key: 'busram')],
                ['name' => '[Laptop] Số khe cắm RAM', 'value' => $request->input(key: 'kheram')],
                ['name' => '[Laptop] Hỗ trợ RAM tối đa', 'value' => $request->input(key: 'maxram')],
                ['name' => '[Laptop] Pin', 'value' => $request->input(key: 'pin')],
                ['name' => '[Laptop] Ổ cứng', 'value' => $request->input(key: 'ssd')],
                ['name' => '[Laptop] Dung lượng ổ cứng', 'value' => $request->input(key: 'gb')],
                ['name' => '[Laptop] Số khe ổ cứng', 'value' => $request->input(key: 'khessd')],
                ['name' => '[Laptop] Cân nặng', 'value' => $request->input(key: 'kg')],
                ['name' => '[Laptop] Màu sắc', 'value' => $request->input(key: 'color')],
                ['name' => '[Laptop] Camera', 'value' => $request->input(key: 'cam')],
                ['name' => '[Laptop] OS', 'value' => $request->input(key: 'os')],
            ];
            if ($request->hasFile('productThumbnail')) {
                $thumb = $request->file('productThumbnail');
                $thumbName = "Thumb" . "." . $thumb->extension(); 
                $thumb->move($folderPath, $thumbName);
                $attributes[] = [
                    'name' => 'Thumbnail',
                    'value' => "/{$valuePath}/{$thumbName}",
                ];
            }
            if ($request->hasFile('productThumbnailSmall')) {
                $thumbSmall = $request->file('productThumbnailSmall');
                $thumbSmallName = "Thumb_small" . "." . $thumbSmall->extension(); 
                $thumbSmall->move($folderPath, $thumbSmallName);
                $attributes[] = [
                    'name' => 'Thumbnail Small',
                    'value' => "/{$valuePath}/{$thumbSmallName}",
                ];
            }
            if ($request->hasFile('productImages')) {
                $images = $request->file('productImages');
                
                foreach ($images as $index => $image) {
                    if ($index > 5) break; // Chỉ lưu tối đa 5 ảnh
                    
                    // Tạo đường dẫn lưu ảnh, với tên thư mục là `id` của sản phẩm
                    $imageName = "Image" . ($index + 1) . "." . $image->extension(); // Tạo tên ảnh

                    // Lưu ảnh vào thư mục với tên được xác định
                    $image->move($folderPath, $imageName);

                    // Thêm đường dẫn ảnh vào mảng attributes
                    $attributes[] = [
                        'name' => 'Image' . ($index + 1),
                        'value' => "/{$valuePath}/{$imageName}",
                    ];
                }
            }
            
            foreach ($attributes as $attribute) {
                // Tìm kiếm attribute trong bảng 'attributes' theo tên
                $attributeRecord = Attribute::where('name', $attribute['name'])->first();
                
                // Nếu tìm thấy attribute, gắn nó vào laptop
                if ($attributeRecord) {
                    $laptop->attributes()->attach($attributeRecord->id, ['value' => $attribute['value']]);
                }
            }
            

        }
        return redirect()->back()->with('success', 'Sản phẩm đã được lưu thành công!');
    }

    public function deleteProduct($table, $id)
    {
        // Kiểm tra bảng và sử dụng model tương ứng
        switch ($table) {
            case 'laptop':
                $product = Laptop::find($id);
                break;
    
            case 'cpu':
                $product = Cpu::find($id);
                break;

            case 'gpu':
                $product = Gpu::find($id);
                break;

            case 'monitor':
                $product = Gpu::find($id);
                break;
    
            // Thêm các trường hợp cho các bảng khác
            default:
                return response()->json(['error' => 'Invalid table'], 400);
        }
    
        if ($product) {
            // Soft delete
            $product->delete();
            return response()->json(['success' => 'Xoa thanh cong san pham'], 200);
        }
    
        return response()->json(['error' => 'Product not found'], 404);
    }
    
    
}
