<?php

namespace App\Services;

use App\Models\Cooling;
use App\Models\Cpu;
use App\Models\Gaminggear;
use App\Models\Laptop;
use App\Models\Monitor;
use App\Models\Order;
use Illuminate\Support\Facades\Http;

class RecommendationService
{
  public function getDatasetForSVD($limitPerUser = 20)
  {
    $orders = Order::with('orderDetails')->get();
    $data = $orders
      ->groupBy('user_id') // Nhóm theo user_id
      ->map(function ($userOrders) use ($limitPerUser) {
        return $userOrders
          ->flatMap(function ($order) {
            return $order->orderDetails->map(function ($detail) use ($order) {
              return [
                'user_id' => $order->user_id,
                'product_identifier' => $detail->product_type . '_' . $detail->product_id,
                'interaction_score' => $detail->quantity,
              ];
            });
          })
          ->take($limitPerUser);
      })
      ->flatten(1);
    return $data->values();
  }
  public function fetchRecommendationsFromAPI($userId = null)
  {
    $response = Http::get("http://127.0.0.1:9100/recommend", [
      'user_id' => $userId
    ]);
    if ($response->successful()) {
      return $response->json();
    }
    return null;
  }

  public function mapRecommendationsToProducts(array $recommendations)
  {
    $products = [];

    foreach ($recommendations as $recommendation) {
      // Parse product type and ID
      preg_match('/^(laptop|cpu|monitor|cooling|gaminggear)_(\d+)$/', $recommendation, $matches);

      if (!empty($matches)) {
        $type = $matches[1];
        $id = $matches[2];

        // Fetch the model based on type
        $model = $this->getProductModel($type);

        if ($model) {
          $product = $model::find($id);

          if ($product) {
            $products[] = [
              'id' => $product->id,
              'name' => $product->name,
              'thumbnail' => $product->attributes->firstWhere('name', 'Thumbnail')?->pivot->value ?? 'N/A',
              'price' => $product->attributes->firstWhere('name', 'Price')?->pivot->value ?? 'N/A',
              'deal_price' => $product->attributes->firstWhere('name', 'Deal Price')?->pivot->value ?? 'N/A',
              'category_id' => $product->category_id ?? 'N/A',
            ];
          }
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
}
