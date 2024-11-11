<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'customer_name',
        'phone_number',
        'shipping_address',
        'payment_method',
        'note',
        'total_price',
        'status'
    ];
}
