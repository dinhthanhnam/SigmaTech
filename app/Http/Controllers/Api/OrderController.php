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
        $cartItems = $request->input('items', []); 

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
                'product_type' => $cartItem['productType'],
                'product_id' => $cartItem['productId'],
                'quantity' => $cartItem['quantity'],
                'price' => $cartItem['price'],
            ]);
            CartItem::where('user_id', $userId)
            ->where('product_type', $cartItem['productType'])
            ->where('product_id', $cartItem['productId'])
            ->delete();
        }

        return $order;
    }
    public function index()
    {
        $userId = auth()->id();
        $orders = Order::where('user_id', $userId)->get();
        $orders = $orders -> reverse();
        return response()->json([
            'orders' => $orders
        ]);
    }

    // Lấy chi tiết đơn hàng
    public function getOrderDetails($id)
    {
        $order = Order::with('orderDetails')->find($id);
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $orderDetails = $order->orderDetails->map(function ($item) {
            switch ($item->product_type) {
                case 'laptops':
                    $laptop = Laptop::where('id', $item->product_id)->with('attributes')->first();
                    $item->image = $laptop->attributes->where('name', 'Image1')->first()->pivot->value; 
                    $item->name = $laptop->name;
                    break;
            }
            return [
                'image' => $item->image,
                'name' => $item->name,
                'quantity' => $item->quantity,
                'price' => number_format($item->price, 0, ',', '.'),
            ];
        });

        return response()->json([
            'id' => $order->id,
            'customer_name' => $order->customer_name,
            'phone_number' => $order->phone_number,
            'shipping_address' => $order->shipping_address,
            'payment_method' => $order->payment_method,
            'note' => $order->note,
            'total_price' => number_format($order->total_price, 0, ',', '.'),
            'status' => $order->status,
            'order_details' => $orderDetails
        ]);
    }
}
