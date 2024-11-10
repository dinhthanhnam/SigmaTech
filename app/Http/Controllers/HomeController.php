<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Cpu;
use App\Models\Gpu;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function index()
    {

        $gamingLaptops = Laptop::whereHas('attributes', function ($query) {
            $query->where('name', '[Laptop] Loại laptop')
                  ->where('value', 'Gaming');
        })->with('attributes')->get();

        $officeLaptops = Laptop::whereHas('attributes', function ($query) {
            $query->where('name', '[Laptop] Loại laptop')
                  ->where('value', 'Office');
        })->with('attributes')->get();

        $cpus = Cpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Loại linh kiện')
                  ->where('value', 'CPU');
        })->with('attributes')->get();

        $laptopsSale = Laptop::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(laptop_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
        })->with('attributes')->get();

        $cpusSale = Cpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(cpu_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
        })->with('attributes')->get();
        
        $flashSaleItems = collect()->concat($laptopsSale)->concat($cpusSale);


        return view('index', compact( 'flashSaleItems', 'gamingLaptops', 'officeLaptops', 'cpus'));
    }
    

    public function getSuggestions(Request $request)
    {
        $search = $request->query('query', '');
        $searchresults = [];

        if ($search !== '') {
            $laptops = Laptop::where('name', 'like', '%' . $search . '%') -> with('attributes') ->get();

            $cpus = Cpu::where('name', 'like', '%' . $search . '%')-> with('attributes') ->get();

            $gpus = Gpu::where('name', 'like', '%' . $search . '%')-> with('attributes') ->get();

            // Gộp tất cả các sản phẩm vào một biến chung
            foreach($laptops as $laptop) {
                $type = $laptop->attributes->firstWhere('name', '[Laptop] Loại laptop')->pivot->value ?? 'N/A';
                $brand = $laptop->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $laptop->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';
                $laptop->image = $imageurl;
                $laptop->link = 'laptops/'.$type.'/'.$brand.'/'.$laptop->id;
            }
            foreach($cpus as $cpu) {
                $type = $cpu->attributes->firstWhere('name', 'Loại linh kiện')->pivot->value ?? 'N/A';
                $brand = $cpu->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $cpu->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';
                $cpu->image = $imageurl;
                $cpu->link = 'pc-parts/'.$type.'/'.$brand.'/'.$cpu->id;
            }
            foreach($gpus as $gpu) {
                $type = $gpu->attributes->firstWhere('name', 'Loại linh kiện')->pivot->value ?? 'N/A';
                $brand = $gpu->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $gpu->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';
                $gpu->image = $imageurl;
                $gpu->link = 'pc-parts/'.$type.'/'.$brand.'/'.$gpu->id;
            }
            $searchresults = collect()->merge($laptops)->merge($cpus)->merge($gpus);
        }

        // Trả về kết quả dưới dạng JSON
        return response()->json($searchresults);
    }
}
