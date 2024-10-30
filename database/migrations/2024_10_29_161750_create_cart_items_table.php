<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Khóa ngoại đến bảng users
            $table->string('product_type'); // Loại sản phẩm (cpu, gpu, laptop, monitor)
            $table->unsignedBigInteger('product_id'); // ID của sản phẩm trong bảng tương ứng
            $table->string('name'); // Tên sản phẩm
            $table->unsignedBigInteger('category_id'); // ID danh mục sản phẩm
            $table->integer('quantity')->default(1); // Số lượng sản phẩm
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
