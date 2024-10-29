<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\CartItem;


class CartController extends Controller
{
    public function index()
    {
        $userId = auth()->id(); // Lấy ID người dùng đã đăng nhập
        $cartItems = CartItem::where('user_id', $userId)->get(); // Lấy các sản phẩm trong giỏ hàng của người dùng

        return view('cart', compact('cartItems')); 
    }

    public function add(Request $request)
    {
        // Lấy thông tin từ request
        $productId = $request->product_id;
        $productType = $request->product_type; // Loại sản phẩm (cpu, gpu, laptop, monitor)
        $userId = auth()->id(); // ID người dùng đã đăng nhập
        $quantity = $request->quantity; // Số lượng mặc định là 1
        $productName = $request->product_name; // Lấy tên sản phẩm từ request
        $categoryId = $request->category_id; // Lấy category_id từ request

        // Khai báo biến sản phẩm
        $product = null;

        // Tìm sản phẩm tương ứng từ bảng tương ứng
        switch ($productType) {
            // case 'cpu':
            //     $product = Cpu::findOrFail($productId);
            //     break;
            // case 'gpu':
            //     $product = Gpu::findOrFail($productId);
            //     break;
            case 'laptop':
                $product = Laptop::findOrFail($productId);
                break;
            // case 'monitor':
            //     $product = Monitor::findOrFail($productId);
            //     break;
            default:
                abort(404); // Nếu loại sản phẩm không hợp lệ
        }

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $cartItem = CartItem::where('user_id', $userId)
            ->where('product_id', $productId)
            ->where('product_type', $productType)
            ->first();

        if ($cartItem) {
            // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } 
        else {
            // Nếu chưa có, thêm sản phẩm mới vào giỏ hàng
            CartItem::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'product_type' => $productType,
                'quantity' => $quantity,
                'name' => $productName, // Lưu tên sản phẩm
                'category_id' => $categoryId, // Lưu category_id
            ]);
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }


}
