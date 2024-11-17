<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    use HasFactory;

    protected $table = 'accessories'; // Tên bảng
    protected $fillable = ['name', 'category_id'];

    /**
     * Relationship with attributes.
     */
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'accessory_attribute')
                    ->withPivot('value'); // Lấy cả cột value từ bảng trung gian
    }

    /**
     * Relationship with category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
