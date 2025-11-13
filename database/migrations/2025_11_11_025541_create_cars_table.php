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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->string('plate');
            $table->enum('transmission', ['automatic', 'manual']);
            $table->enum('fuel_type', ['petrol', 'diesel', 'electric']);
            $table->integer('seats');
            $table->unsignedBigInteger('price_per_day');
            $table->string('thumbnail');
            $table->enum('status', ['available', 'rented', 'maintenance'])->default('available');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
