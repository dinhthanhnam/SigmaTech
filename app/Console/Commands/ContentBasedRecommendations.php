<?php

namespace App\Console\Commands;

use App\Models\Cpu;
use App\Models\Laptop;
use App\Models\Monitor;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ContentBasedRecommendations extends Command
{
    protected $signature = 'recommendations:generate';
    protected $description = 'Thực hiện refresh gợi ý sản phẩm dựa trên độ tương đồng cosine';

    public function handle()
    {
        $this->info('Bắt đầu refresh gợi ý sản phẩm...');
        $dataset = $this->generateRecommendations();
        $keywords = $this->getUniqueKeywords($dataset);
        $vectors = $this->generateFeatureVectors($dataset, $keywords);
        $this->saveRecommendations($vectors, $dataset);
        $this->info('Đã refresh gợi ý sản phẩm thành công!');
    }

    private function generateRecommendations()
    {
        $laptops = Laptop::select('id', 'name')->get()->map(function ($item) {
            $item->category = 'laptops';
            return $item;
        });

        $cpus = Cpu::select('id', 'name')->get()->map(function ($item) {
            $item->category = 'cpus';
            return $item;
        });

        $monitors = Monitor::select('id', 'name')->get()->map(function ($item) {
            $item->category = 'monitors';
            return $item;
        });

        return $laptops->merge($cpus)->merge($monitors)->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'category' => $product->category,
            ];
        });
    }

    private function getUniqueKeywords(Collection $dataset)
    {
        $allWords = $dataset->pluck('name')
            ->flatMap(fn($name) => preg_split('/[\s,]+/', mb_strtolower($name)))
            ->unique()
            ->values();

        return $allWords->toArray();
    }

    private function generateFeatureVectors(Collection $dataset, array $keywords)
    {
        if (empty($keywords)) {
            $this->info('Không có từ khóa nào được tạo.');
            return [];
        }

        return $dataset->mapWithKeys(function ($product) use ($keywords) {
            $words = preg_split('/[\s,]+/', mb_strtolower($product['name']));
            $vector = array_map(fn($keyword) => in_array($keyword, $words) ? 1 : 0, $keywords);
            return [$product['id'] => $vector];
        })->toArray();
    }

    private function calculateCosineSimilarity(array $vectorA, array $vectorB)
    {
        $dotProduct = array_sum(array_map(fn($a, $b) => $a * $b, $vectorA, $vectorB));
        $magnitudeA = sqrt(array_sum(array_map(fn($val) => $val * $val, $vectorA)));
        $magnitudeB = sqrt(array_sum(array_map(fn($val) => $val * $val, $vectorB)));

        if ($magnitudeA == 0 || $magnitudeB == 0) {
            return 0; // Tránh chia cho 0
        }

        return $dotProduct / ($magnitudeA * $magnitudeB);
    }

    private function saveRecommendations(array $vectors, Collection $dataset)
    {
        $recommendations = [];

        $productIds = array_keys($vectors);

        foreach ($productIds as $i => $productIdA) {
            for ($j = $i + 1; $j < count($productIds); $j++) {
                $productIdB = $productIds[$j];
                $similarity = $this->calculateCosineSimilarity($vectors[$productIdA], $vectors[$productIdB]);

                if ($similarity > 0) {
                    $productA = $dataset->first(fn($item) => $item['id'] === $productIdA);
                    $productB = $dataset->first(fn($item) => $item['id'] === $productIdB);

                    if ($productA && $productB) {
                        $recommendations[] = [
                            'product_id' => $productA['id'],
                            'product_category' => $productA['category'],
                            'recommended_product_id' => $productB['id'],
                            'recommended_product_category' => $productB['category'],
                            'similarity_score' => $similarity,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }
        }

        if (!empty($recommendations)) {
            DB::table('recommendations')->insert($recommendations);
            $this->info("Đã lưu " . count($recommendations) . " gợi ý vào bảng 'recommendations'.");
        } else {
            $this->info('Không có gợi ý nào được lưu.');
        }
    }
}
