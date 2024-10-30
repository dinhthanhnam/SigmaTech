<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    // Định nghĩa tên bảng nếu tên không phải là số nhiều của model
    protected $table = 'attributes';

    // Các thuộc tính có thể được gán hàng loạt
    protected $fillable = ['name', 'data_type'];
    // Quan hệ nhiều-nhiều với Laptop qua bảng trung gian laptop_attribute
    public function laptops()
    {
        return $this->belongsToMany(Laptop::class, 'laptop_attribute')
                    ->withPivot('value'); // Lấy cả cột value từ bảng trung gian
    }
    public function cpus()
    {
        return $this->belongsToMany(CPU::class, 'cpu_attribute')
                    ->withPivot('value'); // Lấy cả cột value từ bảng trung gian
    }
}