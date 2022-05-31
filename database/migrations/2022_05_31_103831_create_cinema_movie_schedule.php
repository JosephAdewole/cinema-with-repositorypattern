<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCinemaMovieSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinema_movie_schedule', function (Blueprint $table) {
            // $table->id();
            // $table->integer('cinema_id')->unsigned();
            // $table->integer('movie_id')->unsigned();
            // $table->integer('schedule_id')->unsigned();
            $table->foreignId('cinema_id')->constrained();
            $table->foreignId('movie_id')->constrained();
            $table->foreignId('schedule_id')->constrained();
            $table->primary(['cinema_id', 'movie_id', 'schedule_id']);
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
        Schema::dropIfExists('cinema_movie_schedule');
    }
}
