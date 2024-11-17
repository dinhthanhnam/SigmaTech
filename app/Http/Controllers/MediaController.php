<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

class MediaController extends Controller
{
    public function show($brand, $id)
    {
        // Lấy media theo id, chỉ nếu nó có attribute 'Loại linh kiện' là 'media'
        $media_devices = Media::whereHas('attributes', function ($query) {
            $query->where('name', 'Loại linh kiện')->where('value', 'media');
        })->with('attributes')->findOrFail($id);

        // Tìm attribute 'Brand' và 'Type' của media
        $mediaBrand = optional($media_devices->attributes->where('name', 'Brand')->first())->pivot->value;

        // Kiểm tra xem các thông tin brand và type từ URL có khớp với dữ liệu của media không
        if (strtolower($mediaBrand) !== strtolower($brand)) {
            abort(404); // Không tìm thấy nếu thông tin không khớp
        }

        // Trả về view cùng với các dữ liệu cần thiết
        return view('single.single-media', compact( 'mediaBrand', 'media'));
    }

    public function showMedia()
    {
        $media_devices = Media::with('attributes')->paginate(12);
        $topMedia = Media::whereHas('attributes', function ($query) {
            $query->where('name', 'On Top')
                  ->where('value', '1');
        })
        ->with('attributes')
        ->limit(10)
        ->get();

        foreach($media_devices as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $item->link = 'media_devices/'.$brand.'/'.$item->id;
        };

        foreach($topMedia as $item) {
            $brand = $item->attributes->firstWhere('name', 'Brand')->pivot->value ?? 'N/A';
            $item->link = 'media_devices/'.$brand.'/'.$item->id;
        };
        
        foreach($media_devices as $item) {
            $brand = $item->attributes->where('name', 'Brand')->first()->pivot->value;
            $item->link = 'media_devices/'.$brand.'/'.$item->id;
        };
        return view('categories.media-devices', compact('media_devices', 'topMedia'));
    }
}

