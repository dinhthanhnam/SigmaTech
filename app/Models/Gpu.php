<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gpu extends Model
{
    use HasFactory;
    protected $table = 'gpus';
    protected $fillable = ['name', 'category_id'];
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'gpu_attribute')
                    ->withPivot('value'); // Lấy cả cột value từ bảng trung gian
    }
}