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
        Schema::create('gaminggear_attribute', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gaminggear_id')->constrained()->onDelete('cascade'); // Khóa ngoại tới bảng laptops
            $table->foreignId('attribute_id')->constrained()->onDelete('cascade'); // Khóa ngoại tới bảng attributes
            $table->string('value');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gaminggear_attribute');
    }
};
