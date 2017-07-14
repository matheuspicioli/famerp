<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaChamadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ListaChamadas', function (Blueprint $table) {
            $table->increments('ListaChamadaID')->unsigned();
            $table->string('Prontuario', 255)->nullable();
            $table->text('Observacao')->nullable();

            $table->integer('PacienteID')->unsigned();
            $table->foreign('PacienteID')->references('PacienteID')->on('Pacientes')
                            ->onDelete('cascade');
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
        Schema::table('ListaChamadas', function (Blueprint $table) {
            $table->dropIfExists('ListaChamadas');
        });
    }
}
