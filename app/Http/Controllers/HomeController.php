<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Cpu;
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
            $query->where('name', 'Sale Price')
            ->whereNotNull('value');
        })->with('attributes')->get();

        $cpusSale = Cpu::whereHas('attributes', function ($query) {
            $query->where('name', 'Sale Price')
            ->whereNotNull('value');
        })->with('attributes')->get();
        
        $flashSaleItems = $laptopsSale->merge($cpusSale);


        return view('index', compact( 'flashSaleItems', 'gamingLaptops', 'officeLaptops', 'cpus'));
    }

}
