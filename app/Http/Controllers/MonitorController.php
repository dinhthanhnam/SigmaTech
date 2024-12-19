<?php

namespace App\Http\Controllers;

use App\Models\Cpu;
use App\Models\Laptop;
use Illuminate\Http\Request;
use App\Models\Monitor;
use Illuminate\Support\Facades\DB;

class MonitorController extends Controller
{
    public function show($brand, $id)
    {
        // Lấy gpu theo id và kèm theo các thuộc tính của nó
        $monitor = Monitor::with('attributes')->findOrFail($id);

        // Tìm attribute 'Brand' và 'Type' của gpu
        $monitorBrand = optional($monitor->attributes->where('name', 'Brand')->first())->pivot->value;
        // $gpuType = optional($gpu->attributes->where('name', '[CPU] Loại gpu')->first())->pivot->value;

        // Kiểm tra xem các thông tin brand và type từ URL có khớp với dữ liệu của gpu không
        if ($monitorBrand !== $brand) {
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
        return view('single.single-monitor', compact('monitorBrand', 'monitor', 'recommendedItems'));
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
    public function showMonitors()
    {
        $monitors = Monitor::with('attributes')->paginate(12);
        $topMonitors = Monitor::whereHas('attributes', function ($query) {
            $query->where('name', 'On Top')
                  ->where('value', '1');
        })
        ->with('attributes')
        ->limit(10)
        ->get();

        foreach($monitors as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $item->link = 'monitors/'.$brand.'/'.$item->id;
        };

        foreach($topMonitors as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $item->link = 'monitors/'.$brand.'/'.$item->id;
        };
        
        foreach($monitors as $item) {
            $brand = $item->attributes->where('name', 'Brand')->first()->pivot->value;
            $item->link = 'monitors/'.$brand.'/'.$item->id;
        };
        
        return view('categories.monitors', compact('monitors', 'topMonitors'));
    }

}
