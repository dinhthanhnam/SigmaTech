<?php

namespace App\Services;

use App\Models\Order;

class RecommendationService
{
    public function getDatasetForSVD($limitPerUser = 20)
    {
        // Lấy tất cả các đơn hàng với chi tiết
        $orders = Order::with('orderDetails')->get();

        // Xử lý dataset với giới hạn số hành vi cho mỗi user
        $data = $orders
            ->groupBy('user_id') // Nhóm theo user_id
            ->map(function ($userOrders) use ($limitPerUser) {
                return $userOrders
                    ->flatMap(function ($order) {
                        return $order->orderDetails->map(function ($detail) use ($order) {
                            return [
                                'user_id' => $order->user_id,
                                'product_identifier' => $detail->product_type . '_' . $detail->product_id, // Ghép product_type và product_id
                                'interaction_score' => $detail->quantity,
                            ];
                        });
                    })
                    ->take($limitPerUser); // Giới hạn số lượng hành vi
            })
            ->flatten(1); // Chuyển dữ liệu từ dạng nhóm thành danh sách phẳng

        return $data->values(); // Reset lại key của mảng
    }
}

