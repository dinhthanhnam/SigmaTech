<?php

namespace App\Listeners;

use App\Models\User;
use SePay\SePay\Events\SePayWebhookEvent;
use SePay\SePay\Notifications\SePayTopUpSuccessNotification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class SePayWebhookListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SePayWebhookEvent $event): void
    {

        // Lấy description từ webhook
        $webhookDescription = "Thanh toan QR SE" . $event->info;

        // Lấy description từ session
        $cachedData = Cache::get('description' . $webhookDescription);

        
        if ($cachedData && isset($cachedData['order_id'])) {
            $orderId = $cachedData['order_id'];
            Log::info('Lấy thông tin từ cache thành công', $cachedData);
            DB::table('orders')
            ->where('id', $orderId)
            ->update(['status' => '2']);
            
        } else {
            Log::warning('Không tìm thấy thông tin pendingOrder trong cache', [
                'description' => $webhookDescription,
            ]);
        }
    }
}