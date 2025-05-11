<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('detalles_pedido', function (Blueprint $table) {
        $table->id(); // PK autoincremental
        $table->unsignedBigInteger('pedido_id'); // FK a pedidos
        $table->unsignedBigInteger('producto_id'); // FK a productos
        $table->integer('cantidad');
        $table->decimal('subtotal', 8, 2);
        $table->timestamps();

        // Relaciones foráneas
        $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
        $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_pedido');
    }
};
