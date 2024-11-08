<?php

namespace App\Http\Controllers;

use App\Models\Cpu;
use App\Models\Gpu;
use Illuminate\Http\Request;
use App\Models\Laptop;
// use App\Models\Cpu;
// use App\Models\Gpu;
// use App\Models\Monitor;
class ProductController extends Controller
{
    public function index()
    {
        return view('admin.pages.product');
    }
    // Controller
    public function showAllProducts()
    {
        $laptops = Laptop::with(['attributes' => function ($query) {
            $query->whereIn('name', ['Brand', 'Model', 'Image1', 'Price', 'Deal Price']);
        }])->get();

        $cpus = CPU::with(['attributes' => function ($query) {
            $query->whereIn('name', ['Brand', 'Model', 'Price', 'Deal Price']);
        }])->get();

        $gpus = GPU::with(['attributes' => function ($query) {
            $query->whereIn('name', ['Brand', 'Model', 'Price', 'Deal Price']);
        }])->get();

        // $monitors = Monitor::with(['attributes' => function ($query) {
        //     $query->whereIn('name', ['Brand', 'Model', 'Price', 'Deal Price']);
        // }])->get();

        // Gộp tất cả các sản phẩm vào một biến chung
        $products = collect()->merge($laptops)/*->merge($cpus)->merge($gpus)->merge($monitors)*/;

        return view('admin.pages.product', compact('products'));
    }


    // public function showAddProduct()
    // {
    //     return view('admin.pages.new-product');
    // }

    // public function getSuggestions(Request $request)
    // {
    //     $search = $request->query('query', '');
    //     $searchresults = [];

    //     if ($search !== '') {
    //         $laptops = Laptop::where('name', 'like', '%' . $search . '%') -> with('attributes') ->get();

    //         $cpus = Cpu::where('name', 'like', '%' . $search . '%')-> with('attributes') ->get();

    //         $gpus = Gpu::where('name', 'like', '%' . $search . '%')-> with('attributes') ->get();

    //         // Gộp tất cả các sản phẩm vào một biến chung
    //         $searchresults = collect()->merge($laptops)->merge($cpus)->merge($gpus);
    //     }

    //     // Trả về kết quả dưới dạng JSON
    //     return response()->json($searchresults);
    // }
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
