<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderDetail;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Laptop;
use App\Models\CPU;
use App\Models\Monitor;
use App\Models\GPU;
use App\Models\CartItem;
use App\Models\Accessory;
use App\Models\Cooling;
use App\Models\Media;
use App\Models\Gaminggear;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

use App\Http\Controllers\CartController;


class OrderController extends Controller
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
    public function orderInfo(Request $request)
    {
        $selectItems = json_decode($request->query('items'), false);

        $userId = auth()->id(); 
        $cartItems = CartItem::where('user_id', $userId)
                            ->whereIn('product_type', collect($selectItems)->pluck('productType')) 
                            ->whereIn('product_id', collect($selectItems)->pluck('productId')) 
                            ->get();
        foreach ($cartItems as $item) {
            $this->getProduct($item);

        }
        session(['cartItems' => $cartItems]);
        return view('order', compact('cartItems'));
    }

    public function placeOrder(Request $request)
    {
        DB::beginTransaction();

        try {
            // Kiểm tra phương thức thanh toán
            if ($request->payment_method === 'banking') {
                $userId = auth()->id();
                $orderId = (Order::max('id') ?? 0) + 1;
                $bankCode = 'mbbank'; 
                $accountNumber = '0123456789';
                $amount = $request->totalPrice / 1000; 
                $recipientName = 'MANH TUAN';
                $description = 'Thanh toan QR SE' . $userId . $orderId;
                $url = 'https://img.vietqr.io/image/' . $bankCode . '-' . $accountNumber . '-compact2' . '.jpg';
                $queryParams = [
                    'amount' => $amount,
                    'addInfo' => $description,
                    'accountName' => $recipientName,
                ];
                $urlWithParams = $url . '?' . http_build_query($queryParams);

                // Lưu đơn hàng vào cơ sở dữ liệu
                $order = $this->saveOrder($request);

                // Tạo mã QR và hiển thị giao diện thanh toán ngân hàng
                Cache::put('description' . $description, [
                    'description' => $description,
                    'amount' => $amount,
                    'order_id' => $order->id, 
                ], now()->addMinutes(30));

                DB::commit();

                return view('banking', [
                    'qrUrl' => $urlWithParams,
                    'amount' => $amount,
                    'description' => $description
                ]);
            }

            // Thanh toán COD
            $this->saveOrder($request);
            DB::commit();

            return redirect()->route('user-account')->with('orderSuccess', true);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Đã xảy ra lỗi khi đặt hàng.');
        }
    }


    private function saveOrder($request)
    {
        $userId = auth()->id();
        $cartItems = session('cartItems', []);

        // Tạo đơn hàng
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

        return $order;
    }
    // public function confirmPayment()
    // {
    //     $pendingOrder = session('pendingOrder');
    
    //     if (!$pendingOrder) {
    //         return redirect()->route('cart')->with('error', 'Không có đơn hàng đang chờ xử lý.');
    //     }
    
    //     DB::beginTransaction();
    
    //     try {
    //         // Tạo đơn hàng từ session
    //         $order = Order::create([
    //             'user_id' => $pendingOrder['user_id'],
    //             'customer_name' => $pendingOrder['customer_name'],
    //             'gender' => $pendingOrder['gender'],
    //             'phone_number' => $pendingOrder['phone_number'],
    //             'shipping_address' => $pendingOrder['shipping_address'],
    //             'payment_method' => $pendingOrder['payment_method'],
    //             'note' => $pendingOrder['note'],
    //             'total_price' => $pendingOrder['total_price'],
    //             'status' => '2',
    //         ]);
    
    //         // Lưu chi tiết đơn hàng
    //         foreach ($pendingOrder['cartItems'] as $cartItem) {
    //             OrderDetail::create([
    //                 'order_id' => $order->id,
    //                 'product_type' => $cartItem['product_type'],
    //                 'product_id' => $cartItem['product_id'],
    //                 'quantity' => $cartItem['quantity'],
    //                 'price' => $cartItem['dealprice'],
    //             ]);
    //             CartItem::where('user_id', $pendingOrder['user_id'])
    //             ->where('product_type', $cartItem['product_type'])
    //             ->where('product_id', $cartItem['product_id'])
    //             ->delete();
    //         }
    
    //         session()->forget('pendingOrder');
    
    //         DB::commit();
    
    //         return redirect()->route('user-account')->with('orderSuccess', true);
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return back()->with('error', 'Đã xảy ra lỗi khi xác nhận thanh toán.');
    //     }
    // }
    

    
}
