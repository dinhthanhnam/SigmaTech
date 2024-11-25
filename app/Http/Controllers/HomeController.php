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
        //laptop gaming
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
        foreach($gamingLaptops as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $type = $item->attributes->firstWhere('name', '[Laptop] Loại laptop')->pivot->value ?? 'N/A';
            $item->link = 'laptops/'.$type.'/'.$brand.'/'.$item->id;
        };
        //Laptop văn phòng
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
        foreach($officeLaptops as $item) {
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
        foreach($cpus as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $type = $item->attributes->firstWhere('name', 'Loại linh kiện')->pivot->value ?? 'N/A';
            $item->link = 'pc-parts/'.$type.'/'.$brand.'/'.$item->id;
        };
        //GPU
        $gpus = Gpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Loại linh kiện')
                  ->where('value', 'GPU');
        })
        ->whereHas('attributes', function ($query) {
            $query->where('name', 'On Top')
                  ->where('value', '1');
        })
        ->with('attributes')
        ->limit(10)->get();
        foreach($gpus as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $type = $item->attributes->firstWhere('name', 'Loại linh kiện')->pivot->value ?? 'N/A';
            $item->link = 'pc-parts/'.$type.'/'.$brand.'/'.$item->id;
        };
        // Màn hình máy tính
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
        //Gaming gear - chuột bàn phím abc
        $gamingGears = Gaminggear::whereHas('attributes', function ($query) {
            $query->where('name', 'On Top')
                  ->where('value', '1');
        })
        ->with('attributes')
        ->limit(10)->get();
        foreach ($gamingGears as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $item->link = 'gaminggears/'.$brand.'/'.$item->id;
        };
        //Media
        $medias = Media::whereHas('attributes', function ($query) {
            $query->where('name', 'On Top')
                  ->where('value', '1');
        })
        ->with('attributes')
        ->limit(10)->get();
        foreach ($medias as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $item->link = 'media/'.$brand.'/'.$item->id;
        };
        //Cooling tản nhiệt
        $coolings = Cooling::whereHas('attributes', function ($query) {
            $query->where('name', 'On Top')
                  ->where('value', '1');
        })
        ->with('attributes')
        ->limit(10)->get();
        foreach ($coolings as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $item->link = 'cooling/'.$brand.'/'.$item->id;
        };
        //phụ kiện máy tính
        $accessories = Accessory::whereHas('attributes', function ($query) {
            $query->where('name', 'On Top')
                  ->where('value', '1');
        })
        ->with('attributes')
        ->limit(10)->get();
        foreach ($accessories as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $item->link = 'accessory/'.$brand.'/'.$item->id;
        };
        
        //Các sản phẩm sale
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
                                    
        $top5FlashSaleItems = $flashSaleItems->sortByDesc('updated_at')->take(5);

        foreach($top5FlashSaleItems as $item)
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
        $slides = Slider::all(['name', 'image']);

        return view('index', 
        compact( 'top5FlashSaleItems', 'gamingLaptops', 'officeLaptops', 'cpus', 'slides', 'monitors', 'gamingGears', 'coolings', 'accessories', 'medias'));
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
