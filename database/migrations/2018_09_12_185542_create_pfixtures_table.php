<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePfixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pfixtures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('home');
            $table->string('away');
            $table->string('home_score')->nullable();
            $table->string('away_score')->nullable();
            $table->boolean('played')->default(false);
            
            
        
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
        Schema::dropIfExists('pfixtures');
    }
}
