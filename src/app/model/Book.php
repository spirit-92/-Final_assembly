<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['name','author_id','year','audition_id'];
    public $timestamps = false;
}
