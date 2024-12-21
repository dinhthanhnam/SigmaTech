<?php

namespace App\Observers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
class CartItemObserver
{
    /**
     * Handle the CartItem "created" event.
     */
    public function created(CartItem $cartItem): void
    {
        $this->updateUserFeatures($cartItem->user);
    }

    /**
     * Handle the CartItem "updated" event.
     */
    public function updated(CartItem $cartItem): void
    {
        $this->updateUserFeatures($cartItem->user);

    }

    /**
     * Handle the CartItem "deleted" event.
     */
    public function deleted(CartItem $cartItem): void
    {
        $this->updateUserFeatures($cartItem->user);

    }

    /**
     * Handle the CartItem "restored" event.
     */
    public function restored(CartItem $cartItem): void
    {
        //
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
    /**
     * Handle the CartItem "force deleted" event.
     */
    public function forceDeleted(CartItem $cartItem): void
    {
        //
    }
}
