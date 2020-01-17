<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFakeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fake_users', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('username',30);
            $table->string('img',30);
            $table->dateTime('date_birth');
            $table->string('gender',2);
            $table->integer('country');
            $table->foreign('country')->references('id')->on('country');
            $table->string('city',30);
            $table->text('about_user');
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
        Schema::dropIfExists('fake_users');
    }
}
