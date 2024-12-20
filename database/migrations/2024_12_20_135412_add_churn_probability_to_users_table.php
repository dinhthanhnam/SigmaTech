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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('recency_days')->default(0);
        $table->integer('frequency')->default(0);
        $table->integer('monetary')->default(0);
        $table->decimal('cart_abandon_rate', 5, 2)->default(0); 
            $table->decimal('churn_probability', 5, 2)->nullable()->after('utype');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['recency_days', 'frequency', 'monetary', 'cart_abandon_rate','churn_probability']);
        });
    }
};
