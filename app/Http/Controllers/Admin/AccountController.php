<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class AccountController extends Controller
{
    public function index()
    {
        // Lấy toàn bộ người dùng từ bảng 'users'
        $users = User::skip(1)->take(PHP_INT_MAX)->get();
        
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 12;
        $items = $users->slice(($currentPage - 1) * $perPage, $perPage); // Lấy items cho trang hiện tại

        // Tạo LengthAwarePaginator
        $paginatedUsers = new LengthAwarePaginator(
            $items,
            $users->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()] 
        );

        // Trả về view 'account' và truyền dữ liệu $users vào view
        return view('admin.account', compact('paginatedUsers'));
    }
}
