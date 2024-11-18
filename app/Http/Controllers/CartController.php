<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\CPU;
use App\Models\Monitor;
use App\Models\GPU;
use App\Models\CartItem;



class CartController extends Controller
{
    public function getProduct($item)
    {
        $yesterday = strtotime('-1 day');
        switch ($item->product_type) {
            case 'laptop':
                $laptop = Laptop::where('id', $item->product_id)->with('attributes')->first();
                $salePrice = $laptop->attributes->where('name', 'Sale Price')->first()?->pivot->value ?? null;
                $saleEndDate = $laptop->attributes->where('name', 'Sale End Date')->first()?->pivot->value ?? null;
                if ($salePrice !== null && $saleEndDate !== null && strtotime($saleEndDate) >=  $yesterday) {
                    $item->dealprice = $salePrice;
                } else {
                    $item->dealprice = $laptop->attributes->where('name', 'Deal Price')->first()?->pivot->value ?? null;
                }
                $item->price = $laptop->attributes->where('name', 'Price')->first()->pivot->value; 
                $item->image = $laptop->attributes->where('name', 'Image1')->first()->pivot->value; 
            break;
            case 'cpu':
                $cpu = CPU::where('id', $item->product_id)->with('attributes')->first();
                $salePrice = $cpu->attributes->where('name', 'Sale Price')->first()?->pivot->value ?? null;
                $saleEndDate = $cpu->attributes->where('name', 'Sale End Date')->first()?->pivot->value ?? null;
                if ($salePrice !== null && $saleEndDate !== null && strtotime($saleEndDate) >=  $yesterday) {
                    $item->dealprice = $salePrice;
                } else {
                    $item->dealprice = $cpu->attributes->where('name', 'Deal Price')->first()?->pivot->value ?? null;
                }
                $item->price = $cpu->attributes->where('name', 'Price')->first()->pivot->value; 
                $item->image = $cpu->attributes->where('name', 'Image1')->first()->pivot->value; 
            break;
            case 'gpu':
                $gpu = GPU::where('id', $item->product_id)->with('attributes')->first();
                $salePrice = $gpu->attributes->where('name', 'Sale Price')->first()?->pivot->value ?? null;
                $saleEndDate = $gpu->attributes->where('name', 'Sale End Date')->first()?->pivot->value ?? null;
                if ($salePrice !== null && $saleEndDate !== null && strtotime($saleEndDate) >= $yesterday) {
                    $item->dealprice = $salePrice;
                } else {
                    $item->dealprice = $gpu->attributes->where('name', 'Deal Price')->first()?->pivot->value ?? null;
                }                
                $item->price = $gpu->attributes->where('name', 'Price')->first()->pivot->value; 
                $item->image = $gpu->attributes->where('name', 'Image1')->first()->pivot->value; 
            break;
            case 'monitor':
                $monitor = Monitor::where('id', $item->product_id)->with('attributes')->first();
                $salePrice = $monitor->attributes->where('name', 'Sale Price')->first()?->pivot->value ?? null;
                $saleEndDate = $monitor->attributes->where('name', 'Sale End Date')->first()?->pivot->value ?? null;
                if ($salePrice !== null && $saleEndDate !== null && strtotime($saleEndDate) >=  $yesterday) {
                    $item->dealprice = $salePrice;
                } else {
                    $item->dealprice = $monitor->attributes->where('name', 'Deal Price')->first()?->pivot->value ?? null;
                }                
                $item->price = $monitor->attributes->where('name', 'Price')->first()->pivot->value; 
                $item->image = $monitor->attributes->where('name', 'Image1')->first()->pivot->value; 
            break;
        }
    }
    public function show()
    {
        $userId = auth()->id(); // Lấy ID người dùng đã đăng nhập
        $cartItems = CartItem::where('user_id', $userId)->get();         
        foreach ($cartItems as $item) {
            $this->getProduct($item);
        }
        return view('cart', compact('cartItems')); 
    }

    public function add(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('message', 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }
        // Lấy thông tin từ request
        $productId = $request->product_id;
        $productType = $request->product_type; // Loại sản phẩm (cpu, gpu, laptop, monitor)
        $userId = auth()->id(); // ID người dùng đã đăng nhập
        $quantity = $request->quantity; // Số lượng mặc định là 1
        $productName = $request->product_name; // Lấy tên sản phẩm từ request
        // Khai báo biến sản phẩm
        $product = null;

        // Tìm sản phẩm tương ứng từ bảng tương ứng
        switch ($productType) {
            case 'cpu':
                $product = Cpu::findOrFail($productId);
                break;
            case 'gpu':
                $product = Gpu::findOrFail($productId);
                break;
            case 'laptop':
                $product = Laptop::findOrFail($productId);
                break;
            case 'monitor':
                $product = Monitor::findOrFail($productId);
                break;
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
            ]);
        }

        return redirect()->back()->with('addToCartSuccess', true);
    }
    public function update(Request $request, $product_type, $product_id)
    {
        // Tìm sản phẩm dựa trên product_type, product_id, và user_id
        $cartItem = CartItem::where('product_type', $product_type)
                            ->where('product_id', $product_id)
                            ->where('user_id', auth()->id())
                            ->first();
    
        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
    
            return response()->json(['success' => 'Số lượng đã được cập nhật']);
        }
    
        return response()->json(['error' => 'Không tìm thấy sản phẩm trong giỏ hàng'], 404);
    }
    
    public function updateBulkQuantity(Request $request)
    {
        $items = $request->items;
        
        foreach ($items as $key => $quantity) {
            list($product_type, $product_id) = explode('_', $key);
            CartItem::where('product_type', $product_type)
                    ->where('product_id', $product_id)
                    ->where('user_id', auth()->id())
                    ->update(['quantity' => $quantity]);
        }

        return response()->json(['success' => 'Số lượng đã được cập nhật']);
    }

    public function remove($product_type, $product_id)
    {
        // Tìm sản phẩm trong giỏ hàng dựa trên product_type và product_id
        $cartItem = CartItem::where('product_type', $product_type)
                            ->where('product_id', $product_id)
                            ->where('user_id', auth()->id()) // Xác định người dùng nếu cần
                            ->first();

        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['success' => 'Sản phẩm đã được xóa khỏi giỏ hàng']);
        }

        return response()->json(['error' => 'Không tìm thấy sản phẩm trong giỏ hàng'], 404);
    }

    public function cartCount()
    {
        $cartItemCount = CartItem::where('user_id', auth()->id())->distinct('id')->count();

        return response()->json(['cartItemCount' => $cartItemCount]);
    }
}
