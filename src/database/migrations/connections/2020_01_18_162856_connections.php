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
        Schema::table('books', function($table) {
            $table->foreign('base_reader')->references('id_book')->on('baseReader');
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
        Schema::table('readers', function($table) {
            $table->foreign('id')->references('id_reader')->on('baseReader');
        });
    }



}
