<?php

namespace App\Listeners;

use App\Models\User;
use SePay\SePay\Events\SePayWebhookEvent;
use SePay\SePay\Notifications\SePayTopUpSuccessNotification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

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
        $description = Cache::get('description' . $webhookDescription);

        
        if ($description) {
            Log::info('Lấy thông tin từ cache thành công', $description);
            $response = Http::post(route('order.confirm-payment'), [
                '_token' => csrf_token(), // Gửi CSRF token
            ]);

            // Kiểm tra trạng thái response
            if ($response->successful()) {
                Log::info('Đã xác nhận thanh toán đơn hàng thành công.');
            } else {
                Log::error('Xác nhận thanh toán đơn hàng thất bại.', [
                    'response' => $response->body(),
                ]);
            }
            
        } else {
            Log::warning('Không tìm thấy thông tin pendingOrder trong cache', [
                'description' => $webhookDescription,
            ]);
        }
    }
}