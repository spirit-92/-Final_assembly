<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';
    protected $fillable = ['name'];
    public $timestamps = false;

}
