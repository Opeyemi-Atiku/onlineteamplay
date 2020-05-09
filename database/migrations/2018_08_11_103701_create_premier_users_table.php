<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremierUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premier_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('premier_id')->unsigned();
            $table->integer('user_id')->unsigned();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('premier_id')->references('id')->on('premiers');

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
        Schema::dropIfExists('premier_users');
    }
}
