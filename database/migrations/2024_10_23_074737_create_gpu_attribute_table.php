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
        Schema::create('gpu_attribute', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gpu_id')->constrained()->onDelete('cascade'); // Khóa ngoại tới bảng gpus
            $table->foreignId('attribute_id')->constrained()->onDelete('cascade'); // Khóa ngoại tới bảng attributes
            $table->string('value'); // Giá trị của thuộc tính
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gpu_attribute');
    }
};
