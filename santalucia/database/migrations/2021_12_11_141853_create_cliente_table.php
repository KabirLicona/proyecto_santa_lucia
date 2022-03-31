<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente1', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cliente');
            $table->text('direccion');
            $table->string('telefono');
            $table->string('celular');
            $table->string('correo');
            $table->unsignedBigInteger('empresa_id');
            $table->string('imagen')->nullable();
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
        Schema::dropIfExists('cliente1');
    }
}
