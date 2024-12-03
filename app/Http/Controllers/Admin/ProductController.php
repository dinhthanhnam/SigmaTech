<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Accessory;
use App\Models\AccessoryAttribute;
use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Cpu;
use App\Models\Gpu;
use App\Models\Monitor;
use App\Models\Attribute;
use App\Models\Cooling;
use App\Models\Gaminggear;
use App\Models\Media;
use App\Models\LaptopAttribute;
use App\Models\CpuAttribute;
use App\Models\GpuAttribute;
use App\Models\MonitorAttribute;
use App\Models\CoolingAttribute;
use App\Models\GamingGearAttribute;
use App\Models\MediaAttribute;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function AllProducts(){
        $laptops = Laptop::with(['attributes', 'categories'])
            ->get()
            ->each(function ($item) {
                $item->setAttribute('data_table', 'laptops');
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
        $gamingGears = Gaminggear::with(['attributes', 'categories'])
            ->get()
            ->each(function ($item) {
                $item->setAttribute('data_table', 'gaming-gear');
            });
        $coolings = Cooling::with(['attributes', 'categories'])
            ->get()
            ->each(function ($item) {
                $item->setAttribute('data_table', 'cooling');
            });
        $medias = Media::with(['attributes', 'categories'])
            ->get()
            ->each(function ($item) {
                $item->setAttribute('data_table', 'media');
            });
        $accessories = Accessory::with(['attributes', 'categories'])
            ->get()
            ->each(function ($item) {
                $item->setAttribute('data_table', 'accessories');
            });


        // Gộp tất cả các sản phẩm vào một biến chung
        $allProducts = collect()->merge($laptops)->merge($cpus)->merge($gpus)->merge($monitors)
                                ->merge($gamingGears)->merge($coolings)->merge($medias)->merge($accessories);
        return($allProducts);
    }

    public function showAllProducts()
    {
        // Gộp tất cả các sản phẩm vào một biến chung
        $allProducts = $this->AllProducts();

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 12;
        $items = $allProducts->slice(($currentPage - 1) * $perPage, $perPage); // Lấy items cho trang hiện tại

        // Tạo LengthAwarePaginator
        $paginatedProducts = new LengthAwarePaginator(
            $items,
            $allProducts->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()] // Đảm bảo đường dẫn đúng
        );

        return view('admin.product', compact('paginatedProducts'));
    }


    public function showAddProduct()
    {
        return view('admin.new-product');
    }

    public function saveProduct(Request $request)
    {
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
            case 'laptops':
                $product = Laptop::find($id);
                break;
    
            case 'cpu':
                $product = Cpu::find($id);
                break;

            case 'gpu':
                $product = Gpu::find($id);
                break;

            case 'monitor':
                $product = Monitor::find($id);
                break;

            case 'gaming-gear':
                $product = Gaminggear::find($id);
                break;
    
            case 'cooling':
                $product = Cooling::find($id);
                break;

            case 'media':
                $product = Media::find($id);
                break;

            case 'accessories':
                $product = Accessory::find($id);
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
    
        return response()->json(['error' => 'Khong tim thay san pham'], 404);
    }
    public function searchProducts(Request $request)
    {
        // Lấy giá trị từ tham số 'search' và 'page'
        $searchQuery = $request->input('search'); // Lấy giá trị tìm kiếm

        // Kiểm tra xem tham số search có tồn tại và không rỗng
        if ($searchQuery) {
            // Giả sử AllProducts trả về một collection
            $allProducts = $this->AllProducts()->filter(function ($product) use ($searchQuery) {
                return str_contains(strtolower($product->name), strtolower($searchQuery));
            });
        } else {
            // Nếu không có giá trị tìm kiếm, lấy tất cả sản phẩm
            $allProducts = $this->AllProducts();
        }
        
        $products = [];
        foreach ($allProducts as $product) {
            $products[] = [
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A',
                'category' => $product->categories->name ?? 'N/A',
                'brand' => $product->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A',
                'model' => $product->attributes->firstWhere('name', 'Model')->pivot->value ?? 'N/A',
                'price' => $product->attributes->firstWhere('name', 'Price')->pivot->value ?? 0,
                'deal_price' => $product->attributes->firstWhere('name', 'Deal Price')->pivot->value ?? 0,
                'data_table' => $product->data_table,
            ];
        }
    
        // Trả về JSON
        return response()->json([
            'products' => $products,
        ]);
    }
    public function getProductDetails($type, $id)
    {
        switch ($type) {
            case 'laptops':
                $product = Laptop::with('attributes')->find($id);
                $table = '[Laptop]';
                break;
            case 'cpu':
                $product = CPU::with('attributes')->find($id);
                $table = '[CPU]';
                break;
            case 'gpu':
                $product = GPU::with('attributes')->find($id);
                $table = '[GPU]';
                break;
            case 'monitor':
                $product = Monitor::with('attributes')->find($id);
                $table = '[MON]';
                break;
            case 'gaming-gear':
                $product = Gaminggear::with('attributes')->find($id);
                $table = '[GG]';
                break;
            case 'cooling':
                $product = Cooling::with('attributes')->find($id);
                $table = '[Cooling]';
                break;
            case 'media':
                $product = Media::with('attributes')->find($id);
                $table = '[Media]';
                break;
            case 'accessories':
                $product = Accessory::with('attributes')->find($id);
                $table = '[Accessory]';
                break;
        }

        $attributes = Attribute::where('name', 'like', $table.'%')
            ->orWhereBetween('id', [1, 18])  
            ->pluck('name');
        
        $productAttributeNames = collect($product->attributes)->pluck('name');
        
        $missingAttributes = $attributes->diff($productAttributeNames);
        
        foreach ($missingAttributes as $missingAttribute) {
            $product->attributes->push([
                'name' => $missingAttribute,
                'pivot' => ['value' => ''] 
            ]);
        }
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($product);
    }
    
    public function updateProduct(Request $request, $productType, $productId)
    {
        function removeDiacritics($str) {
            $str = preg_replace("/[áàảẩẳãạăằắẵặâầấẫậ]/u", "a", $str);
            $str = preg_replace("/[íìĩịỉ]/u", "i", $str);
            $str = preg_replace("/[éèẽẻểẹêếềễệ]/u", "e", $str);
            $str = preg_replace("/[óòỏõọôốồổỗộơớờỡởợỔ]/u", "o", $str);
            $str = preg_replace("/[úùũụủưứừữựử]/u", "u", $str);
            $str = preg_replace("/[đĐ]/u", "d", $str);
            $str = preg_replace("/[ýỷỹỵ]/u", "y", $str);
            return $str;
        }

        function convertString($str) {
            $str = removeDiacritics($str); 
            $str = strtolower($str);      
            $str = preg_replace('/[^a-zA-Z0-9\s]/u', '', $str);
            $str = preg_replace('/\s+/', '_', $str);

            return $str;
        }
        $modelMap = [
            'laptops' => Laptop::class,
            'cpu' => CPU::class,
            'gpu' => GPU::class,
            'monitor' => Monitor::class,
            'media' => Media::class,
            'gaming-gear' => Gaminggear::class,
            'accessories' => Accessory::class,
            'cooling' => Cooling::class
        ];

        if (!array_key_exists($productType, $modelMap)) {
            return response()->json(['success' => false, 'message' => 'Loại sản phẩm không hợp lệ'], 400);
        }

        $model = $modelMap[$productType];
        $product = $model::findOrFail($productId);

        $product->name = $request->input('name');
        $product->save();

        $componentAttributes = ['laptop_loai_laptop', 'gg_loai_thiet_bi', 'cooling_loai_lam_mat', 'media_loai_thiet_bi', 'accessory_loai_thiet_bi'];
        $componentType = null;

        foreach ($componentAttributes as $componentAttribute) {
            if ($request->has($componentAttribute)) {
                $componentType = convertString($request->input($componentAttribute));
                break; 
            }
        }
        
        $brand = $request->input('brand');
        switch($productType){
            case 'laptops':
            case 'media':
            case 'gaming-gear':
            case 'accessories':
            case 'cooling':
                $valuePath = "assets/img/products/$productType/$componentType/$productId";
                $folderPath = public_path($valuePath);
                break;
            case 'cpu':
            case 'gpu':    
                $valuePath = "assets/img/products/pc-parts/$productType/$brand/$productId";
                $folderPath = public_path($valuePath);
                break;
            case 'monitor':
                $valuePath = "assets/img/products/$brand/$productId";
                $folderPath = public_path($valuePath);
                break;
        }
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true);
        }
        $otherAttributes = [
            'Brand', 
            'Model', 
            'Price', 
            'Deal Price', 
            'Rating', 
            'On Top', 
            'Sale Price', 
            'Sale Start Date', 
            'Sale End Date',
            'Tồn kho', 
            'Loại linh kiện'
        ];
        switch($productType){
            case 'laptops':
                $typeAttributes = DB::table('attributes')
                    ->where('name', 'like', '[Laptop]%')
                    ->pluck('name')
                    ->toArray();
                break;
            case 'cpu':
                $typeAttributes = DB::table('attributes')
                    ->where('name', 'like', '[CPU]%')
                    ->pluck('name')
                    ->toArray();
                break;
            case 'gpu':
                $typeAttributes = DB::table('attributes')
                    ->where('name', 'like', '[GPU]%')
                    ->pluck('name')
                    ->toArray();
                break;
            case 'monitor':
                $typeAttributes = DB::table('attributes')
                    ->where('name', 'like', '[MON]%')
                    ->pluck('name')
                    ->toArray();
                break;
            case 'gaming-gear':
                $typeAttributes = DB::table('attributes')
                    ->where('name', 'like', '[GG]%')
                    ->pluck('name')
                    ->toArray();
                break;
            case 'cooling':
                $typeAttributes = DB::table('attributes')
                    ->where('name', 'like', '[Cooling]%')
                    ->pluck('name')
                    ->toArray();
                break;
            case 'media':
                $typeAttributes = DB::table('attributes')
                    ->where('name', 'like', '[Media]%')
                    ->pluck('name')
                    ->toArray();
                break;
            case 'accessories':
                $typeAttributes = DB::table('attributes')
                    ->where('name', 'like', '[Accessory]%')
                    ->pluck('name')
                    ->toArray();
                break;
        }
        $combinedAttributes = array_merge($otherAttributes, $typeAttributes);
        
        // Áp dụng cho từng phần tử trong mảng
        $convertedAttributes = [];
        foreach ($combinedAttributes as $attribute) {
            $convertedAttributes[] = convertString($attribute); // Áp dụng hàm convert cho từng phần tử
        }

        $attributes = [];

        foreach ($convertedAttributes as $key => $convertedAttribute) {
            $value = $request->input($convertedAttribute);
            
            $attributes[$combinedAttributes[$key]] = $value;
        }
        $imageAttributes = [
            'Thumbnail',
            'Thumbnail Small',
            'Image1',
            'Image2',
            'Image3',
            'Image4',
            'Image5'
        ];
        $convertedImageAttributes = [];
        foreach ($imageAttributes as $imageAttribute) {
            $convertedImageAttributes[] = convertString($imageAttribute); // Áp dụng hàm convert cho từng phần tử
        }
        foreach ($convertedImageAttributes as $key => $convertedImageAttribute) {
            if ($request->hasFile($convertedImageAttribute)) {
                $file = $request->file($convertedImageAttribute);
      
                if ($request->has('thumbnail')) {
                    $fileName = 'Thumb'. "." . $file->extension();
                } else if ($request->has('thumbnail_small')) {
                    $fileName = 'Thumb_small'. "." . $file->extension();
                } else {
                    $fileName = $convertedImageAttribute. "." . $file->extension();
                }
                $filePath = $folderPath . '/' . $fileName;
    
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
    
                $file->move($folderPath, $fileName);
    
                $value = '/' .$valuePath . '/' . $fileName;
                $attributes[$imageAttributes[$key]] = $value;
            }
        }

        foreach ($attributes as $name => $value) {
            if ($value == '') {
                $attribute = $product->attributes()->where('name', $name)->first();
        
                // Nếu attribute tồn tại, xóa khỏi product
                if ($attribute) {
                    $product->attributes()->detach($attribute->id); // Xóa attribute
                }
        
                continue; // Bỏ qua vòng lặp này
            }
            $attribute = $product->attributes()->where('name', $name)->first();
    
            if ($attribute) {
                // Cập nhật giá trị
                $attribute->pivot->value = $value;
                $attribute->pivot->save();
            } else {
                $newAttribute = Attribute::firstOrCreate(['name' => $name]);
                $product->attributes()->attach($newAttribute->id, ['value' => $value]);
            }
        }
        

        return response()->json(['success' => true, 'message' => 'Cập nhật sản phẩm thành công']);

    }

}
