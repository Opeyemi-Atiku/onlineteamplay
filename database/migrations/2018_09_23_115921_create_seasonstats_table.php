<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeasonstatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasonstats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('team');
            $table->integer('goals')->default(0);
            $table->integer('assists')->default(0);
            $table->integer('red')->default(0);
            $table->integer('yellow')->default(0);
            $table->integer('motm')->default(0);
            $table->integer('clean_sheets')->default(0);


            $table->foreign('user_id')->references('id')->on('users');
        
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
        Schema::dropIfExists('seasonstats');
    }
}
