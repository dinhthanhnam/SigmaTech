<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function showAllOrders()
    {
        $orders = Order::all();

        return view('admin.order', compact('orders'));
    }
}
