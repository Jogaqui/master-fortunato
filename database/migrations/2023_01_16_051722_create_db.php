<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id('idcategoria');
            $table->string('descripcion');
            $table->integer('estado');
        });
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('idcliente');
            $table->string('apellidos');
            $table->string('dni');
            $table->string('telefono');
            $table->string('email');
            $table->integer('estado');
        });
        Schema::create('comandas', function (Blueprint $table) {
            $table->id('idcomanda');
            $table->integer('idcliente');
            $table->integer('idmesa');
            $table->integer('id');
            $table->date('fecha');
            $table->integer('estado');
        });
        Schema::create('comidas', function (Blueprint $table) {
            $table->id('idcomida');
            $table->string('nombreComida');
            $table->float('precio');
            $table->integer('idcategoria');
            $table->integer('estado');
        });
        Schema::create('detalles_comanda', function (Blueprint $table) {
            $table->integer('cantidad');
            $table->string('observacion');
            $table->integer('idcomanda');
            $table->integer('idcomida');
            $table->integer('estado');
        });
        Schema::create('mesas', function (Blueprint $table) {
            $table->id('idmesa');
            $table->string('ubicacion');
            $table->integer('capacidad');
            $table->integer('estado');
        });
        Schema::create('reservas', function (Blueprint $table) {
            $table->id('idreserva');
            $table->date('fecha');
            $table->integer('estado');
            $table->integer('idcliente');
            $table->integer('idMesa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('comandas');
        Schema::dropIfExists('comidas');
        Schema::dropIfExists('detalles_comanda');
        Schema::dropIfExists('mesas');
        Schema::dropIfExists('reservas');
    }
};
