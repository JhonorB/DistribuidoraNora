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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->string('document_type');
            $table->string('document_number');
            $table->string('fullname');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('claim_type'); // reclamo, queja
            $table->text('description');
            $table->string('status')->default('recibido'); // recibido, en_proceso, resuelto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
