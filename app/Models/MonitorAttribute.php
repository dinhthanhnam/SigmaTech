<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonitorAttribute extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'monitor_attribute';

    // Các thuộc tính có thể được gán hàng loạt
    protected $fillable = ['monitor_id', 'attribute_id', 'value'];

    // Quan hệ với Laptop 
    public function monitor()
    {
        return $this->belongsTo(Monitor::class);
    }
    // Quan hệ với Attribute
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
