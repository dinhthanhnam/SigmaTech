<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\CPU;
use App\Models\Monitor;
use App\Models\GPU;
use App\Models\Accessory;
use App\Models\Cooling;
use App\Models\Media;
use App\Models\Gaminggear;

class OrderController extends Controller
{
    
    public function showAllOrders()
    {
        $orders = Order::paginate(12);

        return view('admin.order', compact('orders'));
    }
    public function getOrderDetails($id)
    {
        $order = Order::with('orderDetails')->find($id);
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        return response()->json([
            'id' => $order->id,
            'customer_name' => $order->customer_name,
            'phone_number' => $order->phone_number,
            'shipping_address' => $order->shipping_address,
            'payment_method' => $order->payment_method,
            'note' => $order->note,
            'total_price' => number_format($order->total_price, 0, ',', '.'),
            'status' => $order->status, 
            'order_details' => $order->orderDetails->map(function ($item) {
                switch ($item->product_type) {
                    case 'laptop':
                        $laptop = Laptop::where('id', $item->product_id)->with('attributes')->first();
                        $item->image = $laptop->attributes->where('name', 'Image1')->first()->pivot->value; 
                        $item->name = $laptop->name;
                    break;
                    case 'cpu':
                        $cpu = CPU::where('id', $item->product_id)->with('attributes')->first();
                        $item->image = $cpu->attributes->where('name', 'Image1')->first()->pivot->value; 
                        $item->name = $cpu->name;
                    break;
                    case 'gpu':
                        $gpu = GPU::where('id', $item->product_id)->with('attributes')->first();
                        $item->image = $gpu->attributes->where('name', 'Image1')->first()->pivot->value;
                        $item->name = $gpu->name; 
                    break;
                    case 'monitor':
                        $monitor = Monitor::where('id', $item->product_id)->with('attributes')->first();
                        $item->image = $monitor->attributes->where('name', 'Image1')->first()->pivot->value; 
                        $item->name = $monitor->name;
                    break;
                    case 'gaminggear':
                        $gaminggear = Gaminggear::where('id', $item->product_id)->with('attributes')->first();
                        $item->image = $gaminggear->attributes->where('name', 'Image1')->first()->pivot->value; 
                        $item->name = $gaminggear->name;
                    break;
                    case 'media':
                        $media = Media::where('id', $item->product_id)->with('attributes')->first();
                        $item->image = $media->attributes->where('name', 'Image1')->first()->pivot->value; 
                        $item->name = $media->name;
                    break;
                    case 'cooling':
                        $cooling = Cooling::where('id', $item->product_id)->with('attributes')->first();
                        $item->image = $cooling->attributes->where('name', 'Image1')->first()->pivot->value; 
                        $item->name = $cooling->name;
                    break;
                    case 'accessory':
                        $accessory = Accessory::where('id', $item->product_id)->with('attributes')->first();
                        $item->image = $accessory->attributes->where('name', 'Image1')->first()->pivot->value; 
                        $item->name = $accessory->name;
                    break;
                }
                return [
                    'image' => $item->image,
                    'name' => $item->name,
                    'quantity' => $item->quantity,
                    'price' => number_format($item->price, 0, ',', '.'),
                ];
            })
        ]);
    }
    public function updateOrder(Request $request, $orderId)
    {
        $order = Order::find($orderId);

        if (!$order) {
            return response()->json(['success' => false, 'message' => 'Đơn hàng không tồn tại']);
        }

        // Cập nhật thông tin bảng orders
        $order->update($request->only(['customer_name', 'phone_number', 'shipping_address', 'payment_method', 'note', 'status']));

        return response()->json(['success' => true, 'message' => 'Đơn hàng đã được cập nhật']);
    }


}
