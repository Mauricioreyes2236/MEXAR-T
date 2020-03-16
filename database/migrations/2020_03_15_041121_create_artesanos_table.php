<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtesanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artesanos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_a');
            $table->string('ap_a');
            $table->string('am_a');
            $table->string('edad');
            $table->string('telefono');
            $table->string('email')->unique();

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
        Schema::dropIfExists('artesanos');
    }
}
