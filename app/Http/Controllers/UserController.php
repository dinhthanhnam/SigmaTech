<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class UserController extends Controller
{
  public function index()
  {
    $user = Auth::user();
    $userId = auth()->id();
    $orders = Order::where('user_id', $userId)->get(); 

    return view('user-account', compact('orders'));
  }
}
