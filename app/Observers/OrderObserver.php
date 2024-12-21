<?php
namespace App\Observers;

use App\Models\Order;
use App\Models\User;
use App\Models\CartItem;
use Carbon\Carbon;

class OrderObserver
{
    public function created(Order $order)
    {
        $this->updateUserFeatures($order->user);
    }

    public function updated(Order $order)
    {
        $this->updateUserFeatures($order->user);
    }

    public function deleted(Order $order)
    {
        $this->updateUserFeatures($order->user);
    }

    private function updateUserFeatures(User $user)
    {
        $lastOrder = Order::where('user_id', $user->id)->latest()->first();
        $recencyDays = $lastOrder ? Carbon::now('Asia/Ho_Chi_Minh')->diffInDays($lastOrder->created_at) : 0;
        $frequency = Order::where('user_id', $user->id)->count();
        $monetary = Order::where('user_id', $user->id)->sum('total_price');
        $cartAbandonRate = CartItem::where('user_id', $user->id)->count();

        $user->update([
            'recency_days' => $recencyDays,
            'frequency' => $frequency,
            'monetary' => $monetary,
            'cart_abandon_rate' => $cartAbandonRate,
        ]);
    }
}

