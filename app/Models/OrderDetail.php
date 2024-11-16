<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['order_id', 'product_type', 'product_id', 'quantity','price'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
