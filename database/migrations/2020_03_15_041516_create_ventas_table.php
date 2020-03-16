<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_artesano')->unsigned();
            $table->integer('id_producto')->unsigned();

            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->foreign('id_artesano')->references('id')->on('artesanos');
            $table->foreign('id_producto')->references('id')->on('productos');

            $table->rememberToken();
            $table->SoftDeletes();
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
        Schema::dropIfExists('ventas');
    }
}
