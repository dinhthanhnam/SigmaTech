<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CpuResource;
use App\Models\Cpu;
use Illuminate\Http\Request;

class CpuController extends Controller
{
    public function index() {
        $laptops = Cpu::with('attributes')->get();
        if($laptops) {
            return CpuResource::collection($laptops);
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