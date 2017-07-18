<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Turmas', function (Blueprint $table) {
            $table->increments('TurmaID')->unsigned();
            $table->string('Nome', 100);
            $table->string('Prontuario', 100)->nullable();
            $table->text('Observacao')->nullable();
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
        Schema::table('Turmas', function(Blueprint $table){
           $table->dropIfExists('Turmas');
        });
    }
}
