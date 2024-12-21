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
        Schema::create('user_recommendations', function (Blueprint $table) {
            $table->id(); // ID tự động tăng
            $table->unsignedBigInteger('user_id'); // ID của người dùng
            $table->decimal('price', 10, 2);
            $table->decimal('deal_price', 10, 2);
            $table->string('thumbnail');
            $table->string('product_id'); // ID sản phẩm
            $table->string('product_name'); // Tên sản phẩm
            $table->string('category_name')->nullable(); // Tên danh mục (tuỳ chọn)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_recommendations');
    }
};
