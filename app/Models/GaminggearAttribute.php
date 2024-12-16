<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaminggearAttribute extends Model
{
    use HasFactory;

    // Định nghĩa tên bảng nếu tên không phải là số nhiều của model
    protected $table = 'gaminggear_attribute';

    // Các thuộc tính có thể được gán hàng loạt
    protected $fillable = ['gaming_gear_id', 'attribute_id', 'value'];

    // Quan hệ với GamingGear
    public function gamingGear()
    {
        return $this->belongsTo(GamingGear::class);
    }

    // Quan hệ với Attribute
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
