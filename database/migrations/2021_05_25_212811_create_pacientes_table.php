<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string("nombre", 100);
            $table->string("eps", 100);
            $table->string("direccion", 100);
            $table->string("tel", 100);
            $table->string("nombre_acompañante", 100)->nullable();
            $table->string("tel_acompañante", 100)->nullable();
            /*          $table->string("antecedentes", 150)->nullable();
            $table->string("motivos", 150)->nullable();
            $table->string("diagnostico", 150)->nullable(); */
            $table->unsignedBigInteger('hospital_id');
            $table->index('hospital_id');
            $table->foreign('hospital_id')->references('id')->on('hospitals')->onDelete('cascade');
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
        Schema::dropIfExists('pacientes');
    }
}
