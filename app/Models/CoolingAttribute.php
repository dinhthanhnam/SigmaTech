<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoolingAttribute extends Model
{
    use HasFactory;

    // Định nghĩa tên bảng nếu tên không phải là số nhiều của model
    protected $table = 'cooling_attribute';

    // Các thuộc tính có thể được gán hàng loạt
    protected $fillable = ['cooling_id', 'attribute_id', 'value'];

    // Quan hệ với Cooling
    public function Cooling()
    {
        return $this->belongsTo(Cooling::class);
    }

    // Quan hệ với Attribute
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
