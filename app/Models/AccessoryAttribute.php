<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessoryAttribute extends Model
{
    use HasFactory;

    // Định nghĩa tên bảng nếu tên không phải là số nhiều của model
    protected $table = 'accessory_attribute';

    // Các thuộc tính có thể được gán hàng loạt
    protected $fillable = ['accessory_id', 'attribute_id', 'value'];

    // Quan hệ với Accessory
    public function Accessory()
    {
        return $this->belongsTo(Accessory::class);
    }

    // Quan hệ với Attribute
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
