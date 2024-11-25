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
use App\Models\Slider;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function index()
    {

        $gamingLaptops = Laptop::whereHas('attributes', function ($query) {
            $query->where('name', '[Laptop] Loại laptop')
                  ->where('value', 'Gaming');
        })
        ->whereHas('attributes', function ($query) {
            $query->where('name', 'On Top')
                  ->where('value', '1');
        })
        ->with('attributes')
        ->limit(10)->get();

        foreach($gamingLaptops as $item)
        {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $type = $item->attributes->firstWhere('name', '[Laptop] Loại laptop')->pivot->value ?? 'N/A';
            $item->link = 'laptops/'.$type.'/'.$brand.'/'.$item->id;
        };

        $officeLaptops = Laptop::whereHas('attributes', function ($query) {
            $query->where('name', '[Laptop] Loại laptop')
                  ->where('value', 'Office');
        })
        ->whereHas('attributes', function ($query) {
            $query->where('name', 'On Top')
                  ->where('value', '1');
        })
        ->with('attributes')
        ->limit(10)->get();

        foreach($officeLaptops as $item)
        {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $type = $item->attributes->firstWhere('name', '[Laptop] Loại laptop')->pivot->value ?? 'N/A';
            $item->link = 'laptops/'.$type.'/'.$brand.'/'.$item->id;
        };
        // CPU
        $cpus = Cpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Loại linh kiện')
                  ->where('value', 'CPU');
        })
        ->whereHas('attributes', function ($query) {
            $query->where('name', 'On Top')
                  ->where('value', '1');
        })
        ->with('attributes')
        ->limit(10)->get();

        foreach($cpus as $item)
        {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $type = $item->attributes->firstWhere('name', 'Loại linh kiện')->pivot->value ?? 'N/A';
            $item->link = 'pc-parts/'.$type.'/'.$brand.'/'.$item->id;
        };

        $monitors = Monitor::whereHas('attributes', function ($query) {
            $query->where('name', 'On Top')
                  ->where('value', '1');
        })
        ->with('attributes')
        ->limit(10)->get();
        foreach ($monitors as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $item->link = 'monitors/'.$brand.'/'.$item->id;
        };

        foreach($cpus as $item)
        {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $type = $item->attributes->firstWhere('name', 'Loại linh kiện')->pivot->value ?? 'N/A';
            $item->link = 'pc-parts/'.$type.'/'.$brand.'/'.$item->id;
        };

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
        
        $flashSaleItems = collect()->concat($laptopsSale)->concat($cpusSale);
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
                $item->link = 'monitors/'.$type.'/'.$brand.'/'.$item->id;
            }elseif ($item->attributes->firstWhere('name','[MON] Tần số quét')) {
                $item->link = 'monitors/'.$type.'/'.$brand.'/'.$item->id;
            };
        }
        $slides = Slider::all(['name', 'image']);

        return view('index', compact( 'flashSaleItems', 'gamingLaptops', 'officeLaptops', 'cpus', 'slides', 'monitors'));
    }

    

    public function getSuggestions(Request $request)
    {
        $search = $request->query('query', '');
        $searchresults = [];

        if ($search !== '') {
            $laptops = Laptop::where('name', 'like', '%' . $search . '%')->with('attributes')->get();
            $cpus = Cpu::where('name', 'like', '%' . $search . '%')->with('attributes')->get();
            $gpus = Gpu::where('name', 'like', '%' . $search . '%')->with('attributes')->get();
            $media = Media::where('name', 'like', '%' . $search . '%')->with('attributes')->get();
            $gaminggears = Gaminggear::where('name', 'like', '%' . $search . '%')->with('attributes')->get();
            $monitors = Monitor::where('name', 'like', '%' . $search . '%')->with('attributes')->get();
            $accessories = Accessory::where('name', 'like', '%' . $search . '%')->with('attributes')->get();

            // Xử lý từng loại sản phẩm
            foreach ($laptops as $laptop) {
                $type = $laptop->attributes->firstWhere('name', '[Laptop] Loại laptop')->pivot->value ?? 'N/A';
                $brand = $laptop->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $laptop->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';
                $laptop->image = $imageurl;
                $laptop->link = url('laptops/' . $type . '/' . $brand . '/' . $laptop->id);
            }
            foreach ($cpus as $cpu) {
                $type = $cpu->attributes->firstWhere('name', 'Loại linh kiện')->pivot->value ?? 'N/A';
                $brand = $cpu->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $cpu->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';
                $cpu->image = $imageurl;
                $cpu->link = url('pc-parts/' . $type . '/' . $brand . '/' . $cpu->id);
            }
            foreach ($gpus as $gpu) {
                $type = $gpu->attributes->firstWhere('name', 'Loại linh kiện')->pivot->value ?? 'N/A';
                $brand = $gpu->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $gpu->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';
                $gpu->image = $imageurl;
                $gpu->link = url('pc-parts/' . $type . '/' . $brand . '/' . $gpu->id);
            }
            foreach ($media as $item) {
                $type = $item->attributes->firstWhere('name', 'Media Type')->pivot->value ?? 'N/A';
                $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $item->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';
                $item->image = $imageurl;
                $item->link = url('media/' . $brand . '/' . $item->id);
            }
            foreach ($gaminggears as $item) {
                $type = $item->attributes->firstWhere('name', 'Gear Type')->pivot->value ?? 'N/A';
                $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $item->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';
                $item->image = $imageurl;
                $item->link = url('gaminggears/' . $brand . '/' . $item->id);
            }
            foreach ($monitors as $monitor) {
                $type = $monitor->attributes->firstWhere('name', 'Monitor Type')->pivot->value ?? 'N/A';
                $brand = $monitor->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $monitor->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';
                $monitor->image = $imageurl;
                $monitor->link = url('monitors/' . $brand . '/' . $monitor->id);
            }
            foreach ($accessories as $accessory) {
                $type = $accessory->attributes->firstWhere('name', 'Accessory Type')->pivot->value ?? 'N/A';
                $brand = $accessory->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $accessory->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';
                $accessory->image = $imageurl;
                $accessory->link = url('accessories/' . $brand . '/' . $accessory->id);
            }

            // Gộp tất cả các sản phẩm
            $searchresults = collect()
                ->merge($laptops)
                ->merge($cpus)
                ->merge($gpus)
                ->merge($media)
                ->merge($gaminggears)
                ->merge($monitors)
                ->merge($accessories);
        }

        // Trả về kết quả dưới dạng JSON
        return response()->json($searchresults);
    }
}
