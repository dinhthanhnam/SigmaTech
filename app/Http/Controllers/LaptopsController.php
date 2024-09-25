<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaptopsController extends Controller
{
    public function laptops() {
        return view("categories.laptops");
    }
    
    public function gaminglaptops() {
        return view("categories.gaming-laptops");
    }
}
