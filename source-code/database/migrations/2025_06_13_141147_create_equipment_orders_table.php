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
        Schema::create('equipment_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('cost');
            $table->integer('count');
            $table->foreignId('order_id')->constrained('orders', 'id')->cascadeOnDelete();
            $table->foreignId('equipment_id')->constrained('electrical_equipments', 'id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_orders');
    }
};
