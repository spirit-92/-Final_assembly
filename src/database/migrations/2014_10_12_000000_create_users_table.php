<?php

use Illuminate\Support\Facades\DB;
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

        Schema::create('token', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('user_id')->index();
            $table->string('token',64);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
        Schema::create('users', function (Blueprint $table) {
            $table->integer('user_id')->autoIncrement();
            $table->string('user_name')->unique();
            $table->string('password',60);
            $table->string('email')->unique();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::table('token', function($table) {
            $table->foreign('user_id')->references('user_id')->on('users');
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
