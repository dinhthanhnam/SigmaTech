<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Cpu;
use Carbon\Carbon;

class SaleController extends Controller
{
    public function index() {
        $laptops = Laptop::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(laptop_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
        })->with('attributes')->get();
        
        $cpus = Cpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale End Date')
                  ->whereRaw("STR_TO_DATE(cpu_attribute.value, '%Y-%m-%d') > ?", [Carbon::now()->format('Y-m-d')]);
        })->with('attributes')->get();
        
        $flashSaleItems = collect()->concat($laptops)->concat($cpus);
        return view('admin.sale-management', compact('flashSaleItems'));
    }
}
