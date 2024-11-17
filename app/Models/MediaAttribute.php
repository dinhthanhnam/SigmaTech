<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaAttribute extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Định nghĩa tên bảng nếu tên không phải là số nhiều của model
    protected $table = 'media_attribute';

    // Các thuộc tính có thể được gán hàng loạt
    protected $fillable = ['media_id', 'attribute_id', 'value'];

    // Quan hệ với Laptop 
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
    // Quan hệ với Attribute
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
