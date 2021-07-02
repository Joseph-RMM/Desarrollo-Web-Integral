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
            $table->unsignedBigInteger('id_tiposdeproductos');
            $table->foreign('id_tiposdeproductos')->references('id')->on('tiposdeproductos');
            $table->date('fecha_devolucion');
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
