<?php

namespace App\Http\Controllers;

use App\Models\Cpu;
use App\Models\LaptopAttribute;
use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Monitor;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;
use Psy\Readline\Hoa\Console;

class LaptopController extends Controller
{
    public function show($type, $brand, $id)
    {
        $laptop = Laptop::with('attributes')->findOrFail($id);
    
        // Tìm attribute 'Brand' và 'Type' của laptop
        $laptopBrand = optional($laptop->attributes->where('name', 'Brand')->first())->pivot->value;
        $laptopType = optional($laptop->attributes->where('name', '[Laptop] Loại laptop')->first())->pivot->value;
    
        // Kiểm tra xem các thông tin brand và type từ URL có khớp với dữ liệu của laptop không
        if (strtolower($laptopBrand) !== strtolower($brand) || strtolower($laptopType) !== strtolower($type)) {
            abort(404); // Không tìm thấy nếu thông tin không khớp
        }
    
        // Lấy các sản phẩm được gợi ý từ bảng recommendations
        $recommendedItems = DB::table('recommendations')
            ->where('product_id', $id)
            ->orderByDesc('similarity_score')
            ->take(6) // Lấy 5 sản phẩm gợi ý hàng đầu
            ->get()
            ->map(function ($recommendation) {
                // Lấy thông tin sản phẩm từ bảng tương ứng dựa trên loại sản phẩm
                $productModel = $this->getProductModel($recommendation->recommended_product_category);
                $product = $productModel::with('attributes')->where('id', $recommendation->recommended_product_id)->first();
                return $product ? [
                    'id' => $product->id,
                    'name' => $product->name,
                    'thumbnail' => $product->attributes->firstWhere('name', 'Thumbnail')?->pivot->value ?? 'N/A',
                    'price' => $product->attributes->firstWhere('name', 'Price')?->pivot->value ?? 'N/A',
                    'deal_price' => $product->attributes->firstWhere('name', 'Deal Price')?->pivot->value ?? 'N/A',
                    'category_id' => $recommendation->recommended_product_category,
                    'similarity_score' => $recommendation->similarity_score,
                ] : null;
                
            })
            ->filter();
    
        // Trả về view cùng với các dữ liệu cần thiết
        return view('single.single-laptop', compact('laptopType', 'laptopBrand', 'laptop', 'recommendedItems'));
    }
    
    /**
     * Lấy model tương ứng dựa trên loại sản phẩm.
     */
    private function getProductModel($category)
    {
        return match ($category) {
            'laptops' => Laptop::class,
            'cpus' => Cpu::class,
            'monitors' => Monitor::class,
            default => null,
        };
    }
    
    public function showGamingLaptops()
    {
        $gamingLaptops = Laptop::whereHas('attributes', function ($query) {
            $query->where('name', '[Laptop] Loại laptop')
                ->where('value', 'Gaming');
        })->with('attributes')->paginate(12);

        foreach ($gamingLaptops as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $type = $item->attributes->firstWhere('name', '[Laptop] Loại laptop')->pivot->value ?? 'N/A';
            $item->link = 'laptops/' . $type . '/' . $brand . '/' . $item->id;
        };

        $topGamingLaptops = Laptop::whereHas('attributes', function ($query) {
            $query->where('name', '[Laptop] Loại laptop')
                ->where('value', 'Gaming');
        })
            ->whereHas('attributes', function ($query) {
                $query->where('name', 'On Top')
                    ->where('value', '1');
            })
            ->with('attributes')
            ->limit(10)
            ->get();

        foreach ($topGamingLaptops as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $type = $item->attributes->firstWhere('name', '[Laptop] Loại laptop')->pivot->value ?? 'N/A';
            $item->link = 'laptops/' . $type . '/' . $brand . '/' . $item->id;
        };

        return view('categories.gaming-laptops', compact('gamingLaptops', 'topGamingLaptops'));
    }

    public function showOfficeLaptops()
    {
        $officeLaptops = Laptop::whereHas('attributes', function ($query) {
            $query->where('name', '[Laptop] Loại laptop')
                ->where('value', 'Office');
        })->with('attributes')->paginate(12);

        foreach ($officeLaptops as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $type = $item->attributes->firstWhere('name', '[Laptop] Loại laptop')->pivot->value ?? 'N/A';
            $item->link = 'laptops/' . $type . '/' . $brand . '/' . $item->id;
        };

        $topOfficeLaptops = Laptop::whereHas('attributes', function ($query) {
            $query->where('name', '[Laptop] Loại laptop')
                ->where('value', 'Office');
        })
            ->whereHas('attributes', function ($query) {
                $query->where('name', 'On Top')
                    ->where('value', '1');
            })
            ->with('attributes')
            ->limit(10)
            ->get();

        foreach ($topOfficeLaptops as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $type = $item->attributes->firstWhere('name', '[Laptop] Loại laptop')->pivot->value ?? 'N/A';
            $item->link = 'laptops/' . $type . '/' . $brand . '/' . $item->id;
        };

        return view('categories.office-laptops', compact('officeLaptops', 'topOfficeLaptops'));
    }

    public function filterLaptops(Request $request)
    {
        $filters = [
            'brand' => $request->input('brand'),
            'price_min' => $request->input('min'),
            'price_max' => $request->input('max'),
            'cpu' => $request->input('cpu'),
            'screensize' => $request->input('screensize'),
            'vga' => $request->input('vga'),
            'ram' => $request->input('ram'),
            'ssd' => $request->input('ssd'),
            'os' => $request->input('os'),
            'weight' => $request->input('weight'),
            'color' => $request->input('color'),
            'sort' => $request->input('sort'),
        ];

        if (!empty($filters['sort'])) {
            if ($filters['sort'] == 'newest') {
                $laptops = Laptop::with('attributes')->orderBy('id', 'desc')->paginate(12);
            } else {
                $laptops = Laptop::with('attributes')
                    ->orderBy(
                    LaptopAttribute::select('value')
                            ->whereColumn('laptop_attribute.laptop_id', 'laptops.id') 
                            ->where('attribute_id', 5), 
                    $filters['sort']
                    )
                    ->paginate(12);
            }
            return view('categories.filtered-laptops', compact('laptops', 'filters'));
        }

        $laptops = Laptop::query();

        if (!empty($filters['brand'])) {
            $laptops->whereHas('attributes', function ($query) use ($filters) {
                $query->where('name', 'Brand')
                    ->where('value', $filters['brand']);
            });
        }

        if (!empty($filters['price_min']) || !empty($filters['price_max'])) {
            $minPrice = $filters['price_min'] ?? 0;
            $maxPrice = $filters['price_max'] ?? PHP_INT_MAX;

            $laptops->whereHas('attributes', function ($query) use ($minPrice, $maxPrice) {
                $query->where('name', 'Price')
                    ->whereBetween('value', [$minPrice, $maxPrice]);
            });
        }

        if (!empty($filters['cpu'])) {
            $laptops->whereHas('attributes', function ($query) use ($filters) {
                $query->where('name', '[Laptop] Vi xử lý')
                    ->where('value', 'like', '%' . $filters['cpu'] . '%');
            });
        }

        if (!empty($filters['screensize'])) {
            $laptops->whereHas('attributes', function ($query) use ($filters) {
                $query->where('name', '[Laptop] Kích thước màn hình')
                    ->where('value', 'like', '%' . $filters['screensize'] . '%');
            });
        }

        if (!empty($filters['vga'])) {
            $laptops->whereHas('attributes', function ($query) use ($filters) {
                $query->where('name', '[Laptop] Card đồ hoạ')
                    ->where('value', 'like', '%' . $filters['vga'] . '%');
            });
        }

        if (!empty($filters['ram'])) {
            $laptops->whereHas('attributes', function ($query) use ($filters) {
                $query->where('name', '[Laptop] Dung lượng RAM')
                    ->where('value', 'like', '%' . $filters['ram'] . '%');
            });
        }

        if (!empty($filters['ssd'])) {
            $laptops->whereHas('attributes', function ($query) use ($filters) {
                $query->where('name', '[Laptop] SSD')
                    ->where('value', 'like', '%' . $filters['ssd'] . '%');
            });
        }

        if (!empty($filters['os'])) {
            $laptops->whereHas('attributes', function ($query) use ($filters) {
                $query->where('name', '[Laptop] OS')
                    ->where('value', 'like', '%' . $filters['os'] . '%');
            });
        }

        if (!empty($filters['weight'])) {
            $laptops->whereHas('attributes', function ($query) use ($filters) {
                $query->where('name', '[Laptop] Trọng lượng')
                    ->where('value', 'like', '%' . $filters['weight'] . '%');
            });
        }

        if (!empty($filters['color'])) {
            $laptops->whereHas('attributes', function ($query) use ($filters) {
                $query->where('name', '[Laptop] Màu sắc')
                    ->where('value', 'like', '%' . $filters['color'] . '%');
            });
        }

        $laptops = $laptops->with('attributes')->paginate(12);


        return view('categories.filtered-laptops', compact('laptops', 'filters'));
    }
}
