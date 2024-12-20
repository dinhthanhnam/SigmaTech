<?php

namespace App\Console\Commands;
use App\Models\Order;
use App\Models\CartItem;
use App\Models\User;
use Illuminate\Console\Command;
use Carbon\Carbon;

class CalculateChurnFeatures extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate:churn-features';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tính toán các đặc trưng khách hàng để dự đoán churn';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::skip(1)->take(PHP_INT_MAX)->get();
        foreach ($users as $user) {
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

        $this->info('Tính toán churn features hoàn tất.');
    }
}
