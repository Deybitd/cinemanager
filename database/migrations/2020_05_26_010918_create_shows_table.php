<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->time('show_start');
            $table->time('show_end');
            $table->date('date');
            $table->double('precio');
            $table->unsignedInteger('sala_id');
            $table->unsignedInteger('movie_id');
            $table->foreign('sala_id')->references('id')->on('salas');
            $table->foreign('movie_id')->references('id')->on('movies');
            $table->timestamps();
        });



    }

    /**
     * Reverse the migrations.A
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shows');
    }
}
