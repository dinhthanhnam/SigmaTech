<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cpu;
use App\Models\Gpu;
use Illuminate\Pagination\LengthAwarePaginator;

class PcpartController extends Controller
{
    public function showPcparts()
    {
        $cpus = CPU::with(['attributes', 'categories'])
            ->get();

        $gpus = GPU::with(['attributes', 'categories'])
            ->get();

        $allProducts = collect()->merge($cpus)->merge($gpus);

        // Lấy thông tin phân trang
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 12;
        $items = $allProducts->slice(($currentPage - 1) * $perPage, $perPage); // Lấy items cho trang hiện tại

        // Tạo LengthAwarePaginator
        $paginatedPcparts = new LengthAwarePaginator(
            $items,
            $allProducts->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()] // Đảm bảo đường dẫn đúng
        );

        return view('categories.pc-parts', compact('paginatedPcparts'));
    }
}
