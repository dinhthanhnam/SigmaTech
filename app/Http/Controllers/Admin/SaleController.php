<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Accessory;
use App\Models\Cooling;
use App\Models\Laptop;
use App\Models\Cpu;
use App\Models\Gaminggear;
use App\Models\Gpu;
use App\Models\Media;
use App\Models\Monitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;


class SaleController extends Controller
{
    private function sale_query($table) {
        return "STR_TO_DATE(REPLACE(".$table."_attribute.value, 'T', ' '), '%Y-%m-%d %H:%i:%s') > ?";
    }

    private function now(){
        return Carbon::now()->format('Y-m-d H:i:s');
    }
    public function index() {
        $laptopsSale = Laptop::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw($this->sale_query('laptop'), $this->now());
        })
        ->with('attributes')->get()
        ->each(function ($item) {
            $item->setAttribute('data_table', 'laptop');
        });
        $cpusSale = Cpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw($this->sale_query('cpu'), $this->now());
        })->with('attributes')->get()
        ->each(function ($item) {
            $item->setAttribute('data_table', 'cpu');
        });
        $gpusSale = Gpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw($this->sale_query('gpu'), $this->now());
        })->with('attributes')->get()
        ->each(function ($item) {
            $item->setAttribute('data_table', 'gpu');
        });
        $monitorsSale = Monitor::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw($this->sale_query('monitor'), $this->now());
        })->with('attributes')->get()
        ->each(function ($item) {
            $item->setAttribute('data_table', 'monitor');
        });
        $gamingGearsSale = Gaminggear::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw($this->sale_query('gaminggear'), $this->now());
        })->with('attributes')->get()
        ->each(function ($item) {
            $item->setAttribute('data_table', 'gaminggear');
        });
        $mediasSale = Media::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw($this->sale_query('media'), $this->now());
        })->with('attributes')->get()
        ->each(function ($item) {
            $item->setAttribute('data_table', 'media');
        });
        $coolingsSale = Cooling::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw($this->sale_query('cooling'), $this->now());
        })->with('attributes')->get()
        ->each(function ($item) {
            $item->setAttribute('data_table', 'cooling');
        });
        $accessoriesSale = Accessory::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw($this->sale_query('accessory'), $this->now());
        })->with('attributes')->get()
        ->each(function ($item) {
            $item->setAttribute('data_table', 'accessory');
        });

        $flashSaleItems = collect()->concat($laptopsSale)->concat($cpusSale)
                                    ->concat($gpusSale)->concat($monitorsSale)
                                    ->concat($gamingGearsSale)->concat($mediasSale)
                                    ->concat($coolingsSale)->concat($accessoriesSale);
                                    
        foreach($flashSaleItems as $item)
        {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            if($item->attributes->firstWhere('name', '[Laptop] Loại laptop')) {
                $type = $item->attributes->firstWhere('name', '[Laptop] Loại laptop')->pivot->value;
                $item->link = 'laptops/'.$type.'/'.$brand.'/'.$item->id;
            }elseif ($item->attributes->firstWhere('name', 'Loại linh kiện')) {
                $type = $item->attributes->firstWhere('name', 'Loại linh kiện')->pivot->value;
                $item->link = 'pc-parts/'.$type.'/'.$brand.'/'.$item->id;
            }elseif ($item->attributes->firstWhere('name','[MON] Tần số quét')) {
                $item->link = 'monitors/'.$brand.'/'.$item->id;
            }elseif ($item->attributes->firstWhere('name','[GG] Loại thiết bị')) {
                $item->link = 'gaminggears/'.$brand.'/'.$item->id;
            }elseif ($item->attributes->firstWhere('name','[Media] Loại thiết bị')) {
                $item->link = 'media/'.$brand.'/'.$item->id;
            }elseif ($item->attributes->firstWhere('name','[Cooling] Loại làm mát')) {
                $item->link = 'cooling/'.$brand.'/'.$item->id;
            }elseif ($item->attributes->firstWhere('name','[Accessory] Loại thiết bị')) {
                $item->link = 'accessory/'.$brand.'/'.$item->id;
            }
        }

        return view('admin.sale-management', compact('flashSaleItems'));
    }

    public function deleteSaleProduct($table, $id)
    {
        // Tên bảng trung gian
        $attribute_table = $table . '_attribute';

        // Thực hiện cập nhật
        $updated = DB::table($attribute_table)
            ->where('attribute_id', 8) // Giả định '9' là ID của attribute 'Sale End Date'
            ->where($table . '_id', $id) // Điều kiện bảng trung gian
            ->update(['value' => Carbon::now()->subSecond()]);

        // Kiểm tra kết quả cập nhật
        if ($updated) {
            return response()->json(['success' => 'Loại bỏ sản phẩm sale thành công'], 200);
        }

        return response()->json(['error' => 'Không tìm thấy sản phẩm'], 404);
    }
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

        return view('admin.new-flashsale', compact('paginatedProducts'));
    }
    public function getSaleDetails($table, $id)
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

        $model = $modelMap[$table];
        $product = $model::with(['attributes' => function ($query) {
            $query->whereIn('attributes.id', [3, 5, 6, 7, 8, 14]); 
        }])->find($id);        
        
        $attributes = Attribute::whereIn('id', [3, 5, 6, 7, 8, 14])->pluck('name');
        
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
    public function updateSale(Request $request, $table, $productId)
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

        if (!array_key_exists($table, $modelMap)) {
            return response()->json(['success' => false, 'message' => 'Loại sản phẩm không hợp lệ'], 400);
        }

        $model = $modelMap[$table];
        $product = $model::findOrFail($productId);

        $saleAttributes = [
            'Price', 
            'Deal Price', 
            'Sale Price', 
            'Sale Start Date', 
            'Sale End Date'
        ];
        $convertedAttributes = [];
        foreach ($saleAttributes as $attribute) {
            $convertedAttributes[] = $this->convertString($attribute); // Áp dụng hàm convert cho từng phần tử
        }

        $attributes = [];

        foreach ($convertedAttributes as $key => $convertedAttribute) {
            $value = $request->input($convertedAttribute);
            
            $attributes[$saleAttributes[$key]] = $value;
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
