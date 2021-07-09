<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productossolicitados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productossolicitados', function (Blueprint $table) {
            $table->id();
            //producto
            $table->unsignedBigInteger('id_tiposdeproductos');
            $table->foreign('id_tiposdeproductos')->references('id')->on('productos');

            $table->date('fecha_entrega');
            $table->date('fecha_devolucion');
            //solicitado
            $table->unsignedBigInteger('id_solicitud');
            $table->foreign('id_solicitud')->references('id')->on('solicitudes');
                        
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
        Schema::dropIfExists('productossolicitados');
    }
}
