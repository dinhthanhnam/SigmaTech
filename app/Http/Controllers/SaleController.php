<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Cpu;
class SaleController extends Controller
{
    public function showFlashSale()
    {
        $laptops = Laptop::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale Price')
            ->whereNotNull('value');
        })->with('attributes')->get();

        $cpus = Cpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale Price')
            ->whereNotNull('value');
        })->with('attributes')->get();
        
        $flashSaleItems = $laptops->merge($cpus);

        return view('pages.flash-sale', compact('flashSaleItems'));
    }
}
