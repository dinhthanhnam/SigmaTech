<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpu extends Model
{
    use HasFactory;
    protected $table = 'cpus';
    protected $fillable = ['name', 'category_id'];
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'cpu_attribute')
                    ->withPivot('value'); // Lấy cả cột value từ bảng trung gian
    }
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
