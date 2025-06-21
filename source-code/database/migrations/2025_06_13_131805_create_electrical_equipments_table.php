<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('electrical_equipments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');
            $table->text('image')->nullable();
            $table->text('characters')->nullable();
            $table->integer('count')->default(0);
            $table->integer('discount')->default(0);
            $table->integer('cost')->default(10);
            $table->boolean('is_deleted')->default(false);
            $table->foreignId('category_id')->constrained('categories', 'id')->cascadeOnDelete();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electrical_equipments');
    }
};
