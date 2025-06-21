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
            $table->timestamp('date_create')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('date_finish')->nullable();
            $table->foreignId('client_id')->constrained('clients', 'id')->cascadeOnDelete();
            $table->foreignId('employee_id')->constrained('employees', 'id')->cascadeOnDelete();
            $table->foreignId('status_id')->constrained('status_orders', 'id')->cascadeOnDelete();
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
