<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Connections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function($table) {
            $table->foreign('author_id')->references('id')->on('authors');
        });
        Schema::table('books', function($table) {
            $table->foreign('audition_id')->references('id')->on('auditions');
        });

        Schema::table('auditions', function($table) {
            $table->foreign('city')->references('id')->on('city');
        });
        Schema::table('auditions', function($table) {
            $table->foreign('owner')->references('id')->on('owner');
        });
        Schema::table('city', function($table) {
            $table->foreign('country_id')->references('id')->on('country');
        });
        Schema::table('baseReader', function($table) {
            $table->foreign('id_reader')->references('id')->on('readers');
        });
        Schema::table('baseReader', function($table) {
            $table->foreign('id_rate')->references('id')->on('rateBook');
        });

        Schema::table('baseReader', function($table) {
            $table->foreign('id_book')->references('id')->on('books');
        });
    }



}
