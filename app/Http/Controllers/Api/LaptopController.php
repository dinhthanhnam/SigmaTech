<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Laptop;
use Illuminate\Http\Request;
use App\Http\Resources\LaptopResource;

class LaptopController extends Controller
{
    public function index() {
        $laptops = Laptop::with('attributes')->get();
        if($laptops) {
            return LaptopResource::collection($laptops);
        } else {
            return response()->json([
                'message' => 'Không có bản ghi nào', 
            ], 200);
        }
        
    }
    public function store() {
        
    }
    public function show() {
        
    }
    public function update() {
        
    }
    public function destroy() {
        
    }
}
