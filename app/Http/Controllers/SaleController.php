<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Cpu;
use Carbon\Carbon;
class SaleController extends Controller
{
    public function showFlashSale()
    {
        $laptops = Laptop::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(laptop_attribute.value, '%Y-%m-%d %H:%i:%s') > ?", [Carbon::now()->format('Y-m-d H:i:s')]);
        })->with('attributes')->get();
        
        $cpus = Cpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(cpu_attribute.value, '%Y-%m-%d %H:%i:%s') > ?", [Carbon::now()->format('Y-m-d H:i:s')]);
        })->with('attributes')->get();
        
        $flashSaleItems = collect()->concat($laptops)->concat($cpus);

        return view('pages.flash-sale', compact('flashSaleItems'));
    }
}
