<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderDetail;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Laptop;
use App\Models\CPU;
use App\Models\CartItem;

class OrderController extends Controller
{
    public function orderInfo(Request $request)
    {
        $selectItems = json_decode($request->query('items'), false);

        $userId = auth()->id(); 
        $cartItems = CartItem::where('user_id', $userId)
                            ->whereIn('product_type', collect($selectItems)->pluck('productType')) 
                            ->whereIn('product_id', collect($selectItems)->pluck('productId')) 
                            ->get();

        foreach ($cartItems as $item) {
            switch ($item->product_type) {
                case 'laptop':
                    $laptop = Laptop::where('id', $item->product_id)
                                    ->with('attributes') 
                                    ->first();
                    $item->dealprice = $laptop->attributes->where('name', 'Deal Price')->first()->pivot->value;
                    $item->price = $laptop->attributes->where('name', 'Price')->first()->pivot->value;
                    $item->image = $laptop->attributes->where('name', 'Image1')->first()->pivot->value;
                
                    break;

                case 'cpu':
                    $cpu = CPU::where('id', $item->product_id)
                            ->with('attributes') 
                            ->first();
                    $item->dealprice = $cpu->attributes->where('name', 'Deal Price')->first()->pivot->value;
                    $item->price = $cpu->attributes->where('name', 'Price')->first()->pivot->value;
                    $item->image = $cpu->attributes->where('name', 'Image1')->first()->pivot->value;
             
                    break;
            }
        }
        session(['cartItems' => $cartItems]);
        return view('order', compact('cartItems'));
    }
    public function placeOrder(Request $request)
    {
        // Bắt đầu transaction
        DB::beginTransaction();

            // Lấy thông tin người dùng và dữ liệu từ form
            $userId = auth()->id(); 
            $cartItems = session('cartItems', []);    

            $order = Order::create([
                'user_id' => $userId,
                'customer_name' => $request->fullname,
                'gender' => $request->gender,
                'phone_number' => $request->phone,
                'shipping_address' => $request->address, 
                'payment_method' => $request->payment_method,              
                'note' => $request->note,
                'total_price' => $request->totalPrice,            
            ]);            
    
            // Lưu chi tiết đơn hàng
            foreach ($cartItems as $cartItem) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_type' => $cartItem->product_type,
                    'product_id' => $cartItem->product_id,                
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->dealprice,
                ]);
                CartItem::where('user_id', $userId)
                        ->where('product_type', $cartItem->product_type)
                        ->where('product_id', $cartItem->product_id)
                        ->delete();
            }
    
            DB::commit();
    
            return redirect()->route('user-account')->with('orderSuccess', true);

    }
    
    
}
