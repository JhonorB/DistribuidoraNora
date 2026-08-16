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
            $table->string('customer_name');
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('shipping_address');
            $table->string('department')->nullable();
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->decimal('shipping_cost', 8, 2)->default(0.00);
            $table->decimal('subtotal', 8, 2)->default(0.00);
            $table->decimal('total', 8, 2)->default(0.00);
            $table->string('status')->default('pendiente'); // pendiente, pagado, completado, cancelado
            $table->string('payment_method')->nullable();
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
