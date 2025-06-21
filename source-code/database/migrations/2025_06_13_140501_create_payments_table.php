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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreignId('order_id')->constrained('orders', 'id')->cascadeOnDelete();
            $table->foreignId('type_payment_id')->constrained('type_payments', 'id')->cascadeOnDelete();
            $table->foreignId('status_id')->constrained('status_payments', 'id')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
