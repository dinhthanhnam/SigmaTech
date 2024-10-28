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
        Schema::create('monitor_attribute', function (Blueprint $table) {
            $table->id();
            $table->foreignId('monitor_id')->constrained()->onDelete('cascade'); // Khóa ngoại tới bảng monitors
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
        Schema::dropIfExists('monitor_attribute');
    }
};
