<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('avatar');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->boolean('free')->default(false);
            $table->boolean('verified')->default(false);
            $table->boolean('subscribed')->default(false);
            $table->string('role')->default('user');
            $table->longText('bio')->nullable();
            $table->string('team')->nullable();
            $table->string('league')->nullable();
            $table->string('position')->nullable();
            $table->boolean('captain')->default(false);
            $table->string('email_token')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
