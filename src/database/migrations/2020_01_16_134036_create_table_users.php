<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->autoIncrement()->unique();
            $table->string('username',30);
            $table->timestamps();
        });
        Schema::create('list_of_reviews', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unique();
            $table->unsignedInteger('user_id');
            $table->index('user_id');
            $table->string('review',30);
            $table->timestamps();
        });

        Schema::table('list_of_reviews', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_users');
    }
}
