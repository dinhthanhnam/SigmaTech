<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LaptopAttribute;
use App\Models\CpuAttribute;
use App\Models\GamingGearAttribute;
use App\Models\GpuAttribute;
use App\Models\MediaAttribute;
use App\Models\MonitorAttribute;
use App\Models\AccessoryAttribute;
use App\Models\CoolingAttribute;
use App\Models\Accessory;
use App\Models\Cooling;
use App\Models\Laptop;
use App\Models\Cpu;
use App\Models\Gaminggear;
use App\Models\GPU;
use App\Models\Media;
use App\Models\Monitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index() {
        $laptopsSale = Laptop::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(laptop_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
        })
        ->with('attributes')->get()
        ->each(function ($item) {
            $item->setAttribute('data_table', 'laptop');
        });
        $cpusSale = Cpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(cpu_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
        })->with('attributes')->get()
        ->each(function ($item) {
            $item->setAttribute('data_table', 'cpu');
        });
        $gpusSale = Gpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(gpu_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
        })->with('attributes')->get()
        ->each(function ($item) {
            $item->setAttribute('data_table', 'gpu');
        });
        $monitorsSale = Monitor::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(monitor_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
        })->with('attributes')->get()
        ->each(function ($item) {
            $item->setAttribute('data_table', 'monitor');
        });
        $gamingGearsSale = Gaminggear::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(gaminggear_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
        })->with('attributes')->get()
        ->each(function ($item) {
            $item->setAttribute('data_table', 'gaminggear');
        });
        $mediasSale = Media::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(media_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
        })->with('attributes')->get()
        ->each(function ($item) {
            $item->setAttribute('data_table', 'media');
        });
        $coolingsSale = Cooling::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(cooling_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
        })->with('attributes')->get()
        ->each(function ($item) {
            $item->setAttribute('data_table', 'cooling');
        });
        $accessoriesSale = Accessory::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(accessory_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
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

}
