<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\CartItem;
class CartController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart', []); 

        return view('cart', compact('cartItems'));
    }
    public function addToCart(Request $request)
    {
        $user = auth()->user();
        $productType = $request->input('product_type');
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $product = null;
        switch ($productType) {
            // case 'cpu':
            //     $product = CPU::find($productId);
            //     break;
            // case 'gpu':
            //     $product = GPU::find($productId);
            //     break;
            case 'laptop':
                $product = Laptop::find($productId);
                break;
            // case 'monitor':
            //     $product = Monitor::find($productId);
            //     break;
        }

        if ($product) {
            CartItem::create([
                'user_id' => $user->id,
                'product_type' => $productType,
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $product->price,
            ]);
            return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng');
        }
        
        return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
    }


}
