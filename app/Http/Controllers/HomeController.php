<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Cpu;
class HomeController extends Controller
{
    public function index()
    {
        $laptops = Laptop::with('attributes')->get();

        $laptopsSale = Laptop::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale Price')
            ->whereNotNull('value');
        })->with('attributes')->get();

        $cpusSale = Cpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale Price')
            ->whereNotNull('value');
        })->with('attributes')->get();
        
        $flashSaleItems = $laptopsSale->merge($cpusSale);


        return view('index', compact('laptops', 'flashSaleItems'));
    }
}
