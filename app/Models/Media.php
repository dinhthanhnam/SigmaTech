<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'media';
    protected $fillable = ['name', 'category_id'];
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'media_attribute')
                    ->withPivot('value'); // Lấy cả cột value từ bảng trung gian
    }
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}