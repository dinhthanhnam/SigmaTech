<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name'];

    // Định nghĩa quan hệ một category có nhiều laptop
    public function laptops()
    {
        return $this->hasMany(Laptop::class);
    }
}
