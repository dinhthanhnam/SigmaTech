<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Cpu;
use App\Models\Gpu;
use App\Models\Media;
use App\Models\Gaminggear;
use App\Models\Monitor;
use App\Models\Accessory;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {
            $message = strtolower($message);

            // Nhận diện nhu cầu mua sản phẩm
            if (strpos($message, 'mua') !== false) {
                // Lấy danh sách từ khóa tìm kiếm
                $keywords = $this->extractKeywords($message);

                if (!empty($keywords)) {
                    // Tìm kiếm sản phẩm trực tiếp
                    $results = $this->searchProducts($keywords);

                    if (!empty($results)) {
                        // Tạo phản hồi hiển thị sản phẩm
                        $response = $this->formatProductResponse($results);
                        $botman->reply($response);
                    } else {
                        $botman->reply("Xin lỗi, tôi không tìm thấy sản phẩm nào phù hợp với yêu cầu của bạn.");
                    }
                } else {
                    $botman->reply("Vui lòng cung cấp thông tin sản phẩm cụ thể hơn để tôi có thể hỗ trợ.");
                }
            } else {
                $botman->reply("Xin lỗi, tôi không hiểu yêu cầu của bạn. Hãy thử gõ 'mua laptop' hoặc 'mua cpu'.");
            }
        });

        $botman->listen();
    }

    // Hàm trích xuất từ khóa tìm kiếm từ tin nhắn
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

    // Hàm tìm kiếm sản phẩm
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

                // Thêm thuộc tính vào đối tượng
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

                // Thêm thuộc tính vào đối tượng
                $cpu->setAttribute('image', $imageurl);
                $cpu->setAttribute('link', url('pc-parts/' . $type . '/' . $brand . '/' . $cpu->id));
            }
            $searchresults = $searchresults->merge($cpus);
        }

        // Tiếp tục thêm logic cho các loại sản phẩm khác (GPU, Media, Gaming Gear, Monitors, Accessories) tương tự như trên
    }

    return $searchresults->toArray();
}


    // Hàm định dạng phản hồi hiển thị sản phẩm
    private function formatProductResponse($products)
{
    $response = "Dưới đây là các sản phẩm tôi tìm thấy:<br>";

    foreach ($products as $product) {
        $response .= "<hr>";
        $response .= "📌 <b>Tên:</b> " . $product['name'] . "<br>";
        $response .= "💰 <b>Giá:</b> " . ($product['price'] ?? 'Liên hệ') . "<br>";
        $response .= "🔗 <b>Link:</b> <a href='" . $product['link'] . "' target='_blank'>Xem sản phẩm tại đây</a><br>";
        $response .= "🖼️ <b>Hình ảnh:</b> <br><img src='" . $product['image'] . "' alt='Hình ảnh' style='max-width:300px;'><br>";
    }

    return $response;
}
}
