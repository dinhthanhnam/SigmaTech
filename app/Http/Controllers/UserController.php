<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Laptop;
use App\Models\CPU;
use App\Models\Monitor;
use App\Models\GPU;


class UserController extends Controller
{
  public function index()
  {
    $user = Auth::user();
    $userId = auth()->id();
    $orders = Order::where('user_id', $userId)->paginate(4); 

    return view('user-account', compact('orders'));
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
        'status' => $order->status, // Bạn có thể dùng 'status' nếu 'status_text' là thuộc tính trong bảng orders
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
  

}
