<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GPUAttribute extends Model
{
    use HasFactory;

    // Định nghĩa tên bảng nếu tên không phải là số nhiều của model
    protected $table = 'gpu_attribute';

    // Các thuộc tính có thể được gán hàng loạt
    protected $fillable = ['gpu_id', 'attribute_id', 'value'];

    // Quan hệ với Laptop 
    public function gpu()
    {
        return $this->belongsTo(Gpu::class);
    }
    // Quan hệ với Attribute
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
