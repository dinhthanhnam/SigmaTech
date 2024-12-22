<?php
namespace App\Console\Commands;

use App\Models\Cooling;
use App\Models\Cpu;
use App\Models\Gaminggear;
use App\Models\Laptop;
use App\Models\Monitor;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Product; // Model để xử lý dữ liệu
use Illuminate\Support\Facades\Log; // Ghi log nếu cần

class FetchRecommendations extends Command
{
    protected $signature = 'recommendations:fetch {userId}';
    protected $description = 'Fetch recommendations from Python API for a specific user';

    public function handle()
    {
        $userId = $this->argument('userId');
        $this->info("Fetching recommendations for user ID: $userId");
        $recommendations = $this->getRecommendationsFromPythonAPI($userId);
        $products = $this->mapRecommendationsToProducts($recommendations);
        $this->saveUserRecommendation($products, $userId);
    }
    public function saveUserRecommendation(array $products, int $userId)
    {
        // Dùng DB để chèn dữ liệu trực tiếp vào bảng user_recommendations
        foreach ($products as $product) {
            DB::table('user_recommendations')->insert([
                'user_id' => $userId,
                'product_id' => $product['id'],
                'product_name' => $product['name'],
                'category_name' => $product['category'],
                'price' => $product['price'],
                'deal_price' => $product['deal_price'],
                'thumbnail' => $product['thumbnail'],
            ]);
        }
    }
    public function mapRecommendationsToProducts(array $apiResponse)
    {
        $products = [];
    
        // Lấy mảng recommendations từ response
        $recommendations = $apiResponse['recommendations'] ?? [];
    
        foreach ($recommendations as $recommendation) {
            // Kiểm tra xem $recommendation có phải là chuỗi
            if (!is_string($recommendation)) {
                continue; // Bỏ qua nếu không phải chuỗi
            }
    
            // Tách chuỗi recommendation thành type và id
            $parts = explode('_', $recommendation);
            if (count($parts) !== 2) {
                continue; // Bỏ qua nếu không đúng định dạng
            }
    
            [$type, $id] = $parts;
    
            // Lấy model tương ứng
            $model = $this->getProductModel($type);
    
            if ($model) {
                $product = $model::find($id);
    
                if ($product) {
                    $categoryName = $product->category->name ?? 'N/A';
    
                    // Thêm sản phẩm vào danh sách
                    $products[] = [
                        'id' => $product->id,
                        'name' => $product->name,
                        'thumbnail' => $product->attributes->firstWhere('name', 'Image1')?->pivot->value ?? 'N/A',
                        'price' => $product->attributes->firstWhere('name', 'Price')?->pivot->value ?? 'N/A',
                        'deal_price' => $product->attributes->firstWhere('name', 'Deal Price')?->pivot->value ?? 'N/A',
                        'category' => $type,
                    ];
                }
            }
        }
    
        return $products;
    }
    
    

    private function getProductModel(string $type)
    {
        // Return the corresponding model class
        return match ($type) {
            'laptop' => Laptop::class,
            'cpu' => Cpu::class,
            'monitor' => Monitor::class,
            'cooling' => Cooling::class,
            'gaminggear' => Gaminggear::class,
            default => null,
        };
    }
    protected function getRecommendationsFromPythonAPI($userId) {
        

        // Gửi HTTP request đến Python API
        $response = Http::post("http://127.0.0.1:9001/recommend", [
            'user_id' => $userId,
        ]);

        if (!$response->successful()) {
            $this->error("Failed to fetch recommendations.");
            return;
        }

        // Nhận dữ liệu JSON từ API
        $recommendations = $response->json();

        return $recommendations;
    }
}
