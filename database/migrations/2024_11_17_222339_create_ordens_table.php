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
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->decimal('total', 10, 2)->nullable();
            $table->string('metodo_pago')->nullable();
            $table->string('estado_pago')->nullable();
            $table->enum('estado', ['pendiente', 'procesando', 'enviado', 'entregado', 'cancelado'])->default('pendiente');
            $table->string('tipo_moneda')->nullable();
            $table->decimal('cantidad_compra', 10, 2)->nullable();
            $table->string('metodo_compra')->nullable();
            $table->text('notas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordens');
    }
};
