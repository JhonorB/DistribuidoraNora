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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->decimal('price_unit', 8, 2)->default(0.00);
            $table->decimal('price_dozen', 8, 2)->default(0.00);
            $table->decimal('price_quarter', 8, 2)->default(0.00);
            $table->decimal('price', 8, 2)->default(0.00);
            $table->text('description')->nullable();
            $table->string('category')->nullable();
            $table->json('images')->nullable();
            $table->integer('stock')->default(100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
