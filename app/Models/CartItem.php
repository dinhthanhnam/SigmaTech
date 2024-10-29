<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_type', // cpu, gpu, laptop, monitor
        'product_id',
        'name',
        'category_id',
        'quantity',
    ];
}
