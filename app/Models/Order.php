<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'customer_name',
        'gender',
        'phone_number',
        'shipping_address',
        'payment_method',
        'note',
        'total_price',
        'status'
    ];
}
