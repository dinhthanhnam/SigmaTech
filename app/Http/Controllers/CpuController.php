<?php

namespace App\Http\Controllers;

use App\Models\Cpu;
use App\Models\Laptop;
use App\Models\Monitor;
use Illuminate\Support\Facades\DB;

class CpuController extends Controller
{
    public function show($brand, $id)
{
    // Lấy cpu theo id, chỉ nếu nó có attribute 'Loại linh kiện' là 'cpu'
    $cpu = Cpu::whereHas('attributes', function ($query) {
        $query->where('name', 'Loại linh kiện')->where('value', 'cpu');
    })->with('attributes')->findOrFail($id);

    // Tìm attribute 'Brand'
    $cpuBrand = optional($cpu->attributes->where('name', 'Brand')->first())->pivot->value;

    // Kiểm tra xem các thông tin brand và type từ URL có khớp với dữ liệu của cpu không
    if (strtolower($cpuBrand) !== strtolower($brand)) {
        abort(404); // Không tìm thấy nếu thông tin không khớp
    }
    
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
    return view('single.single-cpu', compact( 'cpuBrand', 'cpu', 'recommendedItems'));
    }

    private function getProductModel($category)
    {
        return match ($category) {
            'laptops' => Laptop::class,
            'cpus' => Cpu::class,
            'monitors' => Monitor::class,
            default => null,
        };
    }

    public function showCpus()
    {
        $topCpus = Cpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Loại linh kiện')
                  ->where('value', 'cpu');
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

