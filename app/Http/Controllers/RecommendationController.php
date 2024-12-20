<?php
namespace App\Http\Controllers;

use App\Models\Cooling;
use App\Models\Cpu;
use App\Models\Gaminggear;
use App\Models\Laptop;
use App\Models\Monitor;
use App\Models\UserRecommendation;
use App\Services\RecommendationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class RecommendationController extends Controller
{
    protected $recommendationService;

    public function index() {
        if(!Auth::check()) {
            $recommendedItems = [];
            return view('partials.userbased-recommendation', compact('recommendedItems'));
        } else {
            $user_id = Auth::user()->id;
            $recommendedItems = UserRecommendation::where('user_id', $user_id)->get();
            
            return view('partials.userbased-recommendation', compact('recommendedItems'));
        };
    }
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
        $data = $this->recommendationService->fetchRecommendationsFromAPI($userId);

        if ($data) {
            return response()->json($data);
        } else {
            return response()->json(['error' => 'Request failed'], 500);
        }
    }

    public function mapRecommendationsToModels(array $recommendations)
    {
        $products = $this->recommendationService->mapRecommendationsToProducts($recommendations);

        return response()->json($products);
    }
}

