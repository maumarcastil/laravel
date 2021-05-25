<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string("nombre", 100);
            $table->string("dirreccion", 100);
            $table->string("telefono", 100);
            $table->string("tipo_sangre", 100);
            $table->integer("experiencia");
            $table->date("fecha_nacimiento");
            /* falta la llave foranea */
            /*      $table->integer('hospital_id')->unsigned();   
            $table->foreign('hospital_id')->references('id')->on('hospitals'); */
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
        Schema::dropIfExists('doctors');
    }
}
