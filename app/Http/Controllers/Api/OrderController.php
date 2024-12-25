<?php

namespace App\Http\Controllers\Api;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\CartItem;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Laptop;
class OrderController extends Controller
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
            
        }
    }

    public function orderInfo(Request $request)
    {
        // Giải mã các sản phẩm được chọn từ request
        $selectItems = $request->input('items');
        
        // Lấy id của người dùng hiện tại
        $userId = auth()->id();

        // Lọc các sản phẩm trong giỏ hàng theo product type và product id từ request
        $cartItems = CartItem::where('user_id', $userId)
            ->whereIn('product_type', collect($selectItems)->pluck('productType'))
            ->whereIn('product_id', collect($selectItems)->pluck('productId'))
            ->get();

        // Lấy thông tin chi tiết sản phẩm cho từng item trong giỏ hàng
        foreach ($cartItems as $item) {
            $this->getProduct($item);
        }

        // Trả về kết quả dạng JSON
        return response()->json([
            'cartItems' => $cartItems
        ]);
    }
    public function placeOrder(Request $request)
    {
        DB::beginTransaction();

        try {
            // Kiểm tra phương thức thanh toán
            if ($request->payment_method === 'banking') {
                $userId = auth()->id();
                $orderId = (Order::max('id') ?? 0) + 1;
                $amount = $request->totalPrice / 1000;  // Chuyển đổi sang đơn vị nghìn VND

                // Tạo đơn hàng vào cơ sở dữ liệu
                $order = $this->saveOrder($request);

                // Trả về URL QR cho việc thanh toán qua ngân hàng
                $bankCode = 'mbbank';
                $accountNumber = '0986435177';
                $recipientName = 'NGUYEN DUY HUNG';
                $description = 'Thanh toan QR SE' . $userId . $orderId;
                $url = 'https://img.vietqr.io/image/' . $bankCode . '-' . $accountNumber . '-compact2' . '.jpg';
                $queryParams = [
                    'amount' => $amount,
                    'addInfo' => $description,
                    'accountName' => $recipientName,
                ];
                $urlWithParams = $url . '?' . http_build_query($queryParams);

                // Lưu mã QR vào cache
                Cache::put('description' . $description, [
                    'description' => $description,
                    'amount' => $amount,
                    'order_id' => $order->id, 
                ], now()->addMinutes(30));

                DB::commit();

                // Trả về thông tin mã QR thanh toán
                return response()->json([
                    'status' => 'success',
                    'qrUrl' => $urlWithParams,
                    'amount' => $amount,
                    'description' => $description
                ]);
            }

            // Thanh toán COD
            $this->saveOrder($request);
            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Đặt hàng thành công! Bạn sẽ nhận hàng sớm.'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Đã xảy ra lỗi khi đặt hàng.'
            ], 500);
        }
    }
    public function saveOrder($request)
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
}
