<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Laptop;
use App\Models\Cpu;
use App\Models\Gpu;
use App\Models\Media;
use App\Models\Gaminggear;
use App\Models\Monitor;
use App\Models\Accessory;


class BotManController extends Controller
{
    /**
     * Xử lý tin nhắn đầu vào từ người dùng.
     */
    public function handle(Request $request)
    {
        $botman = app('botman');
        $botman->hears('{message}', function (BotMan $botman, $message) {
            if (strpos($message, 'mua') !== false) {
                $keywords = $this->extractKeywords($message);
            
                // Kiểm tra xem câu hỏi có chứa thông tin về khoảng giá hay không
                $minPrice = 0;
                $maxPrice = PHP_INT_MAX;
            
                if (preg_match('/dưới (\d+)/', $message, $matches)) {
                    $maxPrice = (int)$matches[1] * 1000000; // Lấy giá trị "dưới"
                } elseif (preg_match('/khoảng (\d+)[^\d]*(\d+)/', $message, $matches)) {
                    $minPrice = (int)$matches[1] * 1000000; // Giá trị "từ"
                    $maxPrice = (int)$matches[2] * 1000000; // Giá trị "đến"
                }
            
                // Nếu có thông tin về khoảng giá, gọi hàm tìm kiếm theo giá
                if ($minPrice > 0 || $maxPrice < PHP_INT_MAX) {
                    if (!empty($keywords)) {
                        $results = $this->searchProductsByPriceRange($keywords, $minPrice, $maxPrice);
            
                        if (!empty($results)) {
                            $response = $this->formatProductResponse($results);
                            $botman->reply($response);
                        } else {
                            $botman->reply("Xin lỗi, tôi không tìm thấy sản phẩm nào trong mức giá bạn yêu cầu.");
                        }
                    } else {
                        $botman->reply("Vui lòng cung cấp thêm thông tin sản phẩm cụ thể để tôi hỗ trợ tìm kiếm.");
                    }
                } else {
                    // Nếu không có thông tin về giá, tìm kiếm sản phẩm theo từ khóa
                    if (!empty($keywords)) {
                        $results = $this->searchProducts($keywords);
            
                        if (!empty($results)) {
                            $response = $this->formatProductResponse($results);
                            $botman->reply($response);
                        } else {
                            $botman->reply("Xin lỗi, tôi không tìm thấy sản phẩm nào phù hợp với yêu cầu của bạn.");
                        }
                    } else {
                        $botman->reply("Vui lòng cung cấp thêm thông tin sản phẩm cụ thể để tôi hỗ trợ tìm kiếm.");
                    }
                }
            }
            else {
                $response = $this->getChatbotResponse($message);
                $botman->reply($response);
            }
            return;
    });

        $botman->listen();
    }

    /**
     * Gửi yêu cầu tới FastAPI để lấy câu trả lời.
     */
    private function getChatbotResponse($userMessage)
    {
        try {
            $apiUrl = 'http://127.0.0.1:9000/chatbot/'; // Địa chỉ FastAPI
            $response = Http::post($apiUrl, ['question' => $userMessage]);

            if ($response->successful()) {
                return $response->json()['message'];
            }

            return 'Xin lỗi, hiện tại tôi không thể trả lời câu hỏi của bạn.';
        } catch (\Exception $e) {
            return 'Có lỗi xảy ra khi kết nối đến chatbot API.';
        }
    }
    private function extractKeywords($message)
    {
        $keywords = [];
        $possibleKeywords = ['laptop', 'cpu', 'gpu', 'media', 'gaming gear', 'monitor', 'accessory'];

        foreach ($possibleKeywords as $keyword) {
            if (strpos($message, $keyword) !== false) {
                $keywords[] = $keyword;
            }
        }

        return $keywords;
    }

    private function searchProducts($keywords)
{
    $searchresults = collect();

    foreach ($keywords as $keyword) {
        if ($keyword === 'laptop') {
            $laptops = Laptop::with('attributes')->get();
            foreach ($laptops as $laptop) {
                $type = $laptop->attributes->firstWhere('name', '[Laptop] Loại laptop')->pivot->value ?? 'N/A';
                $brand = $laptop->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $laptop->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';
                $price = $laptop->attributes->firstWhere('name', 'Price')->pivot->value ?? 'N/A';
                $laptop->setAttribute('price', $price);
                $laptop->setAttribute('image', $imageurl);
                $laptop->setAttribute('link', url('laptops/' . $type . '/' . $brand . '/' . $laptop->id));
            }
            $searchresults = $searchresults->merge($laptops);
        }

        if ($keyword === 'cpu') {
            $cpus = Cpu::with('attributes')->get();
            foreach ($cpus as $cpu) {
                $type = $cpu->attributes->firstWhere('name', 'Loại linh kiện')->pivot->value ?? 'N/A';
                $brand = $cpu->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $cpu->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';

                $cpu->setAttribute('image', $imageurl);
                $cpu->setAttribute('link', url('pc-parts/' . $type . '/' . $brand . '/' . $cpu->id));
            }
            $searchresults = $searchresults->merge($cpus);
        }

        if ($keyword === 'gpu') {
            $gpus = Gpu::with('attributes')->get();
            foreach ($gpus as $gpu) {
                $type = $gpu->attributes->firstWhere('name', 'Loại linh kiện')->pivot->value ?? 'N/A';
                $brand = $gpu->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $gpu->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';

                $gpu->setAttribute('image', $imageurl);
                $gpu->setAttribute('link', url('pc-parts/' . $type . '/' . $brand . '/' . $gpu->id));
            }
            $searchresults = $searchresults->merge($gpus);
        }

        if ($keyword === 'media') {
            $mediaItems = Media::with('attributes')->get();
            foreach ($mediaItems as $media) {
                $type = $media->attributes->firstWhere('name', 'Loại media')->pivot->value ?? 'N/A';
                $brand = $media->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $media->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';

                $media->setAttribute('image', $imageurl);
                $media->setAttribute('link', url('media/' . $type . '/' . $brand . '/' . $media->id));
            }
            $searchresults = $searchresults->merge($mediaItems);
        }

        if ($keyword === 'gaming gear') {
            $gamingGears = Gaminggear::with('attributes')->get();
            foreach ($gamingGears as $gear) {
                $type = $gear->attributes->firstWhere('name', 'Loại gaming gear')->pivot->value ?? 'N/A';
                $brand = $gear->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $gear->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';

                $gear->setAttribute('image', $imageurl);
                $gear->setAttribute('link', url('gaming-gear/' . $type . '/' . $brand . '/' . $gear->id));
            }
            $searchresults = $searchresults->merge($gamingGears);
        }

        if ($keyword === 'monitor') {
            $monitors = Monitor::with('attributes')->get();
            foreach ($monitors as $monitor) {
                $type = $monitor->attributes->firstWhere('name', 'Loại màn hình')->pivot->value ?? 'N/A';
                $brand = $monitor->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $monitor->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';

                $monitor->setAttribute('image', $imageurl);
                $monitor->setAttribute('link', url('monitors/' . $type . '/' . $brand . '/' . $monitor->id));
            }
            $searchresults = $searchresults->merge($monitors);
        }

        if ($keyword === 'accessory') {
            $accessories = Accessory::with('attributes')->get();
            foreach ($accessories as $accessory) {
                $type = $accessory->attributes->firstWhere('name', 'Loại phụ kiện')->pivot->value ?? 'N/A';
                $brand = $accessory->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $accessory->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';

                $accessory->setAttribute('image', $imageurl);
                $accessory->setAttribute('link', url('accessories/' . $type . '/' . $brand . '/' . $accessory->id));
            }
            $searchresults = $searchresults->merge($accessories);
        }
    }

    return $searchresults->toArray();
}


    private function formatProductResponse($products)
    {
        $response = "Dưới đây là các sản phẩm tôi tìm thấy:<br>";

        foreach ($products as $product) {
            $response .= "<hr>";
            $response .= "📌 <b>Tên:</b> " . $product['name'] . "<br>";
            $response .= "💰 <b>Giá:</b> " . (isset($product['price']) ? number_format($product['price'], 0, ',', '.') . ' VNĐ' : 'Liên hệ') . "<br>";
            $response .= "🔗 <b>Link:</b> <a href='" . $product['link'] . "' target='_blank'>Xem sản phẩm tại đây</a><br>";
            $response .= "🖼️ <b>Hình ảnh:</b> <br><img src='" . $product['image'] . "' alt='Hình ảnh' style='max-width:300px;'><br>";
        }

        return $response;
    }
    private function searchProductsByPriceRange($keywords, $minPrice, $maxPrice)
{
    $searchResults = collect();

    foreach ($keywords as $keyword) {
        if ($keyword === 'laptop') {
            $laptops = Laptop::with('attributes')->get();
            $filteredLaptops = $laptops->filter(function ($laptop) use ($minPrice, $maxPrice) {
                $price = $laptop->attributes->firstWhere('name', 'Price')->pivot->value ?? 0;
                return $price >= $minPrice && $price <= $maxPrice;
            });

            foreach ($filteredLaptops as $laptop) {
                $type = $laptop->attributes->firstWhere('name', '[Laptop] Loại laptop')->pivot->value ?? 'N/A';
                $brand = $laptop->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $laptop->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';
                $price = $laptop->attributes->firstWhere('name', 'Price')->pivot->value ?? 'N/A';

                $laptop->setAttribute('price', $price);
                $laptop->setAttribute('image', $imageurl);
                $laptop->setAttribute('link', url('laptops/' . $type . '/' . $brand . '/' . $laptop->id));
            }
            $searchResults = $searchResults->merge($filteredLaptops);
        }

        // Logic cho CPU
        if ($keyword === 'cpu') {
            $cpus = Cpu::with('attributes')->get();
            $filteredCpus = $cpus->filter(function ($cpu) use ($minPrice, $maxPrice) {
                $price = $cpu->attributes->firstWhere('name', 'Price')->pivot->value ?? 0;
                return $price >= $minPrice && $price <= $maxPrice;
            });

            foreach ($filteredCpus as $cpu) {
                $type = $cpu->attributes->firstWhere('name', 'Loại linh kiện')->pivot->value ?? 'N/A';
                $brand = $cpu->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $cpu->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';
                $price = $cpu->attributes->firstWhere('name', 'Price')->pivot->value ?? 'N/A';

                $cpu->setAttribute('price', $price);
                $cpu->setAttribute('image', $imageurl);
                $cpu->setAttribute('link', url('pc-parts/' . $type . '/' . $brand . '/' . $cpu->id));
            }
            $searchResults = $searchResults->merge($filteredCpus);
        }

        // Logic cho GPU
        if ($keyword === 'gpu') {
            $gpus = Gpu::with('attributes')->get();
            $filteredGpus = $gpus->filter(function ($gpu) use ($minPrice, $maxPrice) {
                $price = $gpu->attributes->firstWhere('name', 'Price')->pivot->value ?? 0;
                return $price >= $minPrice && $price <= $maxPrice;
            });

            foreach ($filteredGpus as $gpu) {
                $type = $gpu->attributes->firstWhere('name', 'Loại linh kiện')->pivot->value ?? 'N/A';
                $brand = $gpu->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $gpu->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';
                $price = $gpu->attributes->firstWhere('name', 'Price')->pivot->value ?? 'N/A';

                $gpu->setAttribute('price', $price);
                $gpu->setAttribute('image', $imageurl);
                $gpu->setAttribute('link', url('pc-parts/' . $type . '/' . $brand . '/' . $gpu->id));
            }
            $searchResults = $searchResults->merge($filteredGpus);
        }

        // Thêm các loại sản phẩm khác (Media, Gaming gear, Monitor, Accessory)
        if ($keyword === 'monitor') {
            $monitors = Monitor::with('attributes')->get();
            $filteredMonitors = $monitors->filter(function ($monitor) use ($minPrice, $maxPrice) {
                $price = $monitor->attributes->firstWhere('name', 'Price')->pivot->value ?? 0;
                return $price >= $minPrice && $price <= $maxPrice;
            });

            foreach ($filteredMonitors as $monitor) {
                $type = $monitor->attributes->firstWhere('name', 'Loại màn hình')->pivot->value ?? 'N/A';
                $brand = $monitor->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
                $imageurl = $monitor->attributes->firstWhere('name', 'Image1')->pivot->value ?? 'N/A';
                $price = $monitor->attributes->firstWhere('name', 'Price')->pivot->value ?? 'N/A';

                $monitor->setAttribute('price', $price);
                $monitor->setAttribute('image', $imageurl);
                $monitor->setAttribute('link', url('monitors/' . $type . '/' . $brand . '/' . $monitor->id));
            }
            $searchResults = $searchResults->merge($filteredMonitors);
        }
    }

    return $searchResults->toArray();
}

}
