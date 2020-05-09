<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premiers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('team_name');
            $table->string('logo')->nullable();
            $table->integer('manager_id')->unsigned()->nullable();
            $table->integer('GP');
            $table->integer('W');
            $table->integer('D');
            $table->integer('L');
            $table->integer('GF');
            $table->integer('GA');
            $table->integer('GD');
            $table->integer('PTS');

            $table->foreign('manager_id')->references('id')->on('users');
            
            $table->rememberToken();
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
        Schema::dropIfExists('premiers');
    }
}
