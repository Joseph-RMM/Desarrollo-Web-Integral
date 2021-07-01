<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PSolicitados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_solicitados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_producto')->references('id')->on('productos');
            
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
        Schema::dropIfExists('p_solicitados');
    }
}
