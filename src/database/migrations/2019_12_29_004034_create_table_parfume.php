<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableParfume extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userAdd', function (Blueprint $table) {
            $table->integer('id',true);
            $table->string('name',10)->unique();
            $table->string('slug',10);
            $table->text('description');
            $table->string('big_img');
            $table->string('small_img');
            $table->integer('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userAdd');
    }
}
