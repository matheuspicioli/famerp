<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pacientes', function (Blueprint $table) {
            $table->increments('PacienteID')->unsigned();
            $table->string('Nome', 255);
            $table->bigInteger('NumeroCartaoSUS');
            $table->char('Sexo');
            $table->date('DataNascimento');
            $table->boolean('AvaliacaoAlterada')->nullable();
            $table->float('Peso');
            $table->float('Altura');

            $table->integer('TurmaID')->unsigned()->nullable();
            $table->foreign('TurmaID')
                ->references('TurmaID')
                ->on('Turmas')
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
        Schema::table('Pacientes', function(Blueprint $table){
            Schema::enableForeignKeyConstraints();
            $table->dropIfExists('Pacientes');
            Schema::disableForeignKeyConstraints();
        });
    }
}
