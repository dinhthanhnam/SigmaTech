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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('customer_name');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('shipping_address');
            $table->string('payment_method');
            $table->string('note')->default(null); 
            $table->integer('total_price');
            $table->enum('status', ['chờ xác nhận', 'đang giao hàng', 'chờ thanh toán', 'hoàn thành', 'đã hủy'])
            ->default('chờ xác nhận'); 
            $table->timestamps();        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
