<?php
namespace App\Http\Controllers;

use App\Services\RecommendationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecommendationController extends Controller
{
    protected $recommendationService;

    public function __construct(RecommendationService $recommendationService)
    {
        $this->recommendationService = $recommendationService;
    }

    public function getDatasetForSVD(Request $request)
    {
        // Nhận limit từ request, mặc định là 20
        $limitPerUser = $request->input('limit', 20);

        // Gọi service để lấy dataset
        $data = $this->recommendationService->getDatasetForSVD($limitPerUser);

        return response()->json($data);
    }
    public function getRecommendations(Request $request)
    {
        $userId = $request->input('user_id');
        if (!$userId) {
            return response()->json(['error' => 'user_id is required'], 400);
        }

        // Gửi request đến FastAPI
        $response = Http::post('http://localhost:9100/recommend', [
            'user_id' => $userId,
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Failed to get recommendations from FastAPI'], 500);
        }

        return response()->json(json_decode($response->body()));
    }
}
