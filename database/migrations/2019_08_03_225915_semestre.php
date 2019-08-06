<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class Semestre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semestre', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('descripcion');
            $table->bigInteger('asignaturaid')->unsigned();
            $table->foreign('asignaturaid')->references('id')->on('asignatura')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semestre');
    }
}
