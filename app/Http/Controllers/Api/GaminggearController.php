<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GaminggearResource;
use App\Models\Gaminggear;
use Illuminate\Http\Request;

class GaminggearController extends Controller
{
    public function index() {
        $gaminggears = Gaminggear::with('attributes')->get();
        if($gaminggears) {
            return GaminggearResource::collection($gaminggears);
        } else {
            return response()->json([
                'message' => 'Không có bản ghi nào', 
            ], 200);
        }
        
    }
}
