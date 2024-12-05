<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Accessory;
use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Cpu;
use App\Models\Gpu;
use App\Models\Monitor;
use App\Models\Attribute;
use App\Models\Cooling;
use App\Models\Gaminggear;
use App\Models\Media;
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
                $item->setAttribute('data_table', 'monitors');
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

    public function showAttributes($dataTable)
    {
        $table = $this->getAttributes($dataTable);
        $attributes = Attribute::where('name', 'like', $table.'%')
            ->orWhereBetween('id', [1, 18])  
            ->where('id', '!=', 11)
            ->pluck('name');

        return response()->json($attributes);
    }
    public function addProduct(Request $request, $table)
    {
        $modelMap = [
            'laptops' => Laptop::class,
            'cpu' => CPU::class,
            'gpu' => GPU::class,
            'monitors' => Monitor::class,
            'media' => Media::class,
            'gaming-gear' => Gaminggear::class,
            'accessories' => Accessory::class,
            'cooling' => Cooling::class
        ]; 
        if ($request->has('laptop_loai_laptop')) {
            if($request->input('laptop_loai_laptop') == 'Gaming'){
                $category = 'gaming';
            } else if($request->input('laptop_loai_laptop') == 'Office'){
                $category = 'office';
            }                
        }else {
            $category = $table;
        }
        $categoryMap = [
            'gaming' => '1',
            'office' => '2',
            'cpu' => '3',
            'gpu' => '3',
            'monitors' => '4',
            'media' => '5',
            'gaming-gear' => '6',
            'accessories' => '7',
            'cooling' => '8'
        ];
        
        $model = $modelMap[$table];
        $categoryId = $categoryMap[$category];
        
        $product = $model::create([
            'name' => $request->input('name'),
            'category_id' => $categoryId
        ]);
            
        $attributes = $this->buildAttribute($request, $table,$product->id);
        if($categoryId == '3'){
            $attributes['Loại linh kiện'] = $table;
        }
        
        foreach ($attributes as $name => $value) {
            if ($value == '') {
                continue; 
            }
            $attributeRecord = Attribute::where('name', $name)->first();            
            if ($attributeRecord) {
                $product->attributes()->attach($attributeRecord->id, ['value' => $value]);
            }
        }
            
        return response()->json(['success' => true, 'message' => 'Thêm sản phẩm thành công']);
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

            case 'monitors':
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
        $modelMap = [
            'laptops' => Laptop::class,
            'cpu' => CPU::class,
            'gpu' => GPU::class,
            'monitors' => Monitor::class,
            'media' => Media::class,
            'gaming-gear' => Gaminggear::class,
            'accessories' => Accessory::class,
            'cooling' => Cooling::class
        ];

        $model = $modelMap[$type];
        $product = $model::with('attributes')->find($id);

        $table = $this->getAttributes($type);

        $attributes = Attribute::where('name', 'like', $table.'%')
            ->orWhereBetween('id', [1, 18])  
            ->where('id', '!=', 11)
            ->pluck('name');
        
        $productAttributeNames = collect($product->attributes)->keyBy('name');

        $orderedAttributes = $attributes->map(function ($attributeName) use ($productAttributeNames) {
        
            if ($productAttributeNames->has($attributeName)) {
                return $productAttributeNames[$attributeName]; 
            }
            
            return [
                'name' => $attributeName,
                'pivot' => ['value' => '']
            ];
        });

        $product->setRelation('attributes', collect($orderedAttributes));
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        return response()->json($product);
    }
    
    public function updateProduct(Request $request, $productType, $productId)
    {
        
        $modelMap = [
            'laptops' => Laptop::class,
            'cpu' => CPU::class,
            'gpu' => GPU::class,
            'monitors' => Monitor::class,
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

        $attributes = $this->buildAttribute($request, $productType,$productId);

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
    public function buildAttribute($request, $table, $productId){
        $componentAttributes = ['laptop_loai_laptop', 'gg_loai_thiet_bi', 'cooling_loai_lam_mat', 'media_loai_thiet_bi', 'accessory_loai_thiet_bi'];
        $componentType = null;

        foreach ($componentAttributes as $componentAttribute) {
            if ($request->has($componentAttribute)) {
                $componentType = $this->convertString($request->input($componentAttribute));
                break; 
            }
        }
        
        $brand = $request->input('brand');
        $valuePath = $this->getPath($table, $brand, $componentType, $productId);
        $folderPath = public_path($valuePath);
        
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
            'Tồn kho'
        ];
        $dataTable = $this->getAttributes($table);
    
        $typeAttributes = DB::table('attributes')
            ->where('name', 'like', $dataTable.'%')
            ->pluck('name')
            ->toArray();
        
        $combinedAttributes = array_merge($otherAttributes, $typeAttributes);
        
        // Áp dụng cho từng phần tử trong mảng
        $convertedAttributes = [];
        foreach ($combinedAttributes as $attribute) {
            $convertedAttributes[] = $this->convertString($attribute); // Áp dụng hàm convert cho từng phần tử
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
            $convertedImageAttributes[] = $this->convertString($imageAttribute); // Áp dụng hàm convert cho từng phần tử
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
        return $attributes;
    }
    public function getPath($dataTable, $brand, $componentType, $productId){
        switch($dataTable){
            case 'laptops':
            case 'media':
            case 'gaming-gear':
            case 'accessories':
            case 'cooling':
                $valuePath = "assets/img/products/$dataTable/$componentType/$productId";
                break;
            case 'cpu':
            case 'gpu':    
                $valuePath = "assets/img/products/pc-parts/$dataTable/$brand/$productId";
                break;
            case 'monitors':
                $valuePath = "assets/img/products/$dataTable/$brand/$productId";
                break;
        }
        return $valuePath;
    }
    public function getAttributes($dataTable)
    {
        switch ($dataTable) {
            case 'laptops':
                $table = '[Laptop]';
                break;
            case 'cpu':
                $table = '[CPU]';
                break;
            case 'gpu':
                $table = '[GPU]';
                break;
            case 'monitors':
                $table = '[MON]';
                break;
            case 'gaming-gear':
                $table = '[GG]';
                break;
            case 'cooling':
                $table = '[Cooling]';
                break;
            case 'media':
                $table = '[Media]';
                break;
            case 'accessories':
                $table = '[Accessory]';
                break;
        }
        return $table;
    }
    public function removeDiacritics($str) 
    {
        $str = preg_replace("/[áàảẩẳãạăằắẵặâầấẫậ]/u", "a", $str);
        $str = preg_replace("/[íìĩịỉ]/u", "i", $str);
        $str = preg_replace("/[éèẽẻểẹêếềễệ]/u", "e", $str);
        $str = preg_replace("/[óòỏõọôốồổỗộơớờỡởợỔ]/u", "o", $str);
        $str = preg_replace("/[úùũụủưứừữựử]/u", "u", $str);
        $str = preg_replace("/[đĐ]/u", "d", $str);
        $str = preg_replace("/[ýỷỹỵ]/u", "y", $str);
        return $str;
    }

    public function convertString($str) 
    {
        $str = $this->removeDiacritics($str); 
        $str = strtolower($str);      
        $str = preg_replace('/[^a-zA-Z0-9\s]/u', '', $str);
        $str = preg_replace('/\s+/', '_', $str);

        return $str;
    }
}
