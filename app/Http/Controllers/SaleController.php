<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\Cooling;
use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Cpu;
use App\Models\Gaminggear;
use App\Models\Gpu;
use App\Models\Media;
use App\Models\Monitor;
use Carbon\Carbon;
class SaleController extends Controller
{
    public function showFlashSale()
    {
        $laptopsSale = Laptop::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(laptop_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
        })
        ->with('attributes')->get();
        $cpusSale = Cpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(cpu_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
        })->with('attributes')->get();
        $gpusSale = Gpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(gpu_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
        })->with('attributes')->get();
        $monitorsSale = Monitor::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(monitor_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
        })->with('attributes')->get();
        $gamingGearsSale = Gaminggear::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(gaminggear_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
        })->with('attributes')->get();
        $mediasSale = Media::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(media_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
        })->with('attributes')->get();
        $coolingsSale = Cooling::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(cooling_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
        })->with('attributes')->get();
        $accessoriesSale = Accessory::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(accessory_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
        })->with('attributes')->get();

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
            }elseif ($item->attributes->firstWhere('name','[MON] Công nghệ tấm nền')) {
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

        return view('pages.flash-sale', compact('flashSaleItems'));
    }
}
