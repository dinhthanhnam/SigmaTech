<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Laptop;
use App\Models\CPU;
use App\Models\Monitor;
use App\Models\GPU;
use App\Models\Accessory;
use App\Models\Cooling;
use App\Models\Media;
use App\Models\Gaminggear;
use App\Models\User;


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
    public function updateAccount(Request $request)
    {
        /** @var \App\Models\User $user **/
        $user = Auth::user(); // Lấy thông tin người dùng hiện tại
    
        // Lưu thông tin từ request vào cơ sở dữ liệu
        $user->name = $request->name;
        $user->gender = $request->gender === 'male' ? 1 : 0; // Chuyển đổi giới tính thành số
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save(); // Lưu vào bảng users
    
        return response()->json(['message' => 'Thông tin đã được cập nhật thành công!']);
    }
    


}
