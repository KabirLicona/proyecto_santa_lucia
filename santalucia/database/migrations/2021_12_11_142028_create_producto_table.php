<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto1', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto');
            $table->integer('precio_compra');
            $table->integer('precio_venta');
            $table->integer('stok');
            $table->unsignedBigInteger('categoria_id');
            $table->string('imagen')->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto1');
    }
}
