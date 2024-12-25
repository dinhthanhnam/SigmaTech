<?php
namespace App\Http\Controllers\Api;

use App\Models\CartItem;
use App\Models\Cpu;
use App\Models\Gpu;
use App\Models\Laptop;
use App\Models\Monitor;
use App\Models\Gaminggear;
use App\Models\Media;
use App\Models\Cooling;
use App\Models\Accessory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getProduct($item)
    {
        $yesterday = strtotime('-1 day');
        switch ($item->product_type) {
            case 'laptops':
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
            case 'gaminggear':
                $gaminggear = Gaminggear::where('id', $item->product_id)->with('attributes')->first();
                $salePrice = $gaminggear->attributes->where('name', 'Sale Price')->first()?->pivot->value ?? null;
                $saleEndDate = $gaminggear->attributes->where('name', 'Sale End Date')->first()?->pivot->value ?? null;
                if ($salePrice !== null && $saleEndDate !== null && strtotime($saleEndDate) >=  $yesterday) {
                    $item->dealprice = $salePrice;
                } else {
                    $item->dealprice = $gaminggear->attributes->where('name', 'Deal Price')->first()?->pivot->value ?? null;
                }                
                $item->price = $gaminggear->attributes->where('name', 'Price')->first()->pivot->value; 
                $item->image = $gaminggear->attributes->where('name', 'Image1')->first()->pivot->value; 
            break;
            case 'media':
                $media = Media::where('id', $item->product_id)->with('attributes')->first();
                $salePrice = $media->attributes->where('name', 'Sale Price')->first()?->pivot->value ?? null;
                $saleEndDate = $media->attributes->where('name', 'Sale End Date')->first()?->pivot->value ?? null;
                if ($salePrice !== null && $saleEndDate !== null && strtotime($saleEndDate) >=  $yesterday) {
                    $item->dealprice = $salePrice;
                } else {
                    $item->dealprice = $media->attributes->where('name', 'Deal Price')->first()?->pivot->value ?? null;
                }                
                $item->price = $media->attributes->where('name', 'Price')->first()->pivot->value; 
                $item->image = $media->attributes->where('name', 'Image1')->first()->pivot->value; 
            break;
            case 'cooling':
                $cooling = Cooling::where('id', $item->product_id)->with('attributes')->first();
                $salePrice = $cooling->attributes->where('name', 'Sale Price')->first()?->pivot->value ?? null;
                $saleEndDate = $cooling->attributes->where('name', 'Sale End Date')->first()?->pivot->value ?? null;
                if ($salePrice !== null && $saleEndDate !== null && strtotime($saleEndDate) >=  $yesterday) {
                    $item->dealprice = $salePrice;
                } else {
                    $item->dealprice = $cooling->attributes->where('name', 'Deal Price')->first()?->pivot->value ?? null;
                }                
                $item->price = $cooling->attributes->where('name', 'Price')->first()->pivot->value; 
                $item->image = $cooling->attributes->where('name', 'Image1')->first()->pivot->value; 
            break;
            case 'accessory':
                $accessory = Accessory::where('id', $item->product_id)->with('attributes')->first();
                $salePrice = $accessory->attributes->where('name', 'Sale Price')->first()?->pivot->value ?? null;
                $saleEndDate = $accessory->attributes->where('name', 'Sale End Date')->first()?->pivot->value ?? null;
                if ($salePrice !== null && $saleEndDate !== null && strtotime($saleEndDate) >=  $yesterday) {
                    $item->dealprice = $salePrice;
                } else {
                    $item->dealprice = $accessory->attributes->where('name', 'Deal Price')->first()?->pivot->value ?? null;
                }                
                $item->price = $accessory->attributes->where('name', 'Price')->first()->pivot->value; 
                $item->image = $accessory->attributes->where('name', 'Image1')->first()->pivot->value; 
            break;
        }
    }

    public function show()
    {
        $userId = auth()->id();
        $cartItems = CartItem::where('user_id', $userId)->get();         
        foreach ($cartItems as $item) {
            $this->getProduct($item);
        }

        return response()->json([
            'cart' => $cartItems
        ]);
    }
    public function addToCart(Request $request)
    {
        $cartItem = CartItem::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->where('product_type', $request->product_type)
            ->first();

        if ($cartItem) {
            // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } 
        else {
            // Nếu chưa có, thêm sản phẩm mới vào giỏ hàng
            $cartItem = CartItem::create([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'product_type' => $request->product_type,
                'quantity' => $request->quantity,
                'name' => $request->name, // Lưu tên sản phẩm
            ]);
        }

        return response()->json([
            'message' => 'Product added to cart successfully',
            'cart_item' => $cartItem
        ], 201);
    }
    public function update(Request $request, $product_type, $product_id)
    {
        // Tìm sản phẩm dựa trên product_type, product_id và user_id
        $cartItem = CartItem::where('product_type', $product_type)
                            ->where('product_id', $product_id)
                            ->where('user_id', auth()->id())
                            ->first();
    
        if ($cartItem) {
            // Cập nhật số lượng
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
    
            return response()->json(['success' => 'Số lượng đã được cập nhật']);
        }
    
        return response()->json(['error' => 'Không tìm thấy sản phẩm trong giỏ hàng'], 404);
    }

    // Cập nhật số lượng nhiều sản phẩm trong giỏ hàng
    public function updateBulkQuantity(Request $request)
    {
        $items = $request->items; // Expected: ["product_type_product_id" => quantity]

        foreach ($items as $key => $quantity) {
            list($product_type, $product_id) = explode('_', $key);

            // Cập nhật số lượng từng sản phẩm
            CartItem::where('product_type', $product_type)
                    ->where('product_id', $product_id)
                    ->where('user_id', auth()->id())
                    ->update(['quantity' => $quantity]);
        }

        return response()->json(['success' => 'Số lượng đã được cập nhật']);
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function remove($product_type, $product_id)
    {
        // Tìm sản phẩm trong giỏ hàng dựa trên product_type, product_id và user_id
        $cartItem = CartItem::where('product_type', $product_type)
                            ->where('product_id', $product_id)
                            ->where('user_id', auth()->id())
                            ->first();

        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['success' => 'Sản phẩm đã được xóa khỏi giỏ hàng']);
        }

        return response()->json(['error' => 'Không tìm thấy sản phẩm trong giỏ hàng'], 404);
    }

    // Lấy số lượng sản phẩm trong giỏ hàng
    public function cartCount()
    {
        $cartItemCount = CartItem::where('user_id', auth()->id())->distinct('id')->count();

        return response()->json(['cartItemCount' => $cartItemCount]);
    }

}

