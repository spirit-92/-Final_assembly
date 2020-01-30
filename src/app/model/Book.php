<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['book_name','author_id','year','audition_id'];
    public $timestamps = false;

    public function author()
    {
        return $this->hasOne('App\model\Author','id');
    }

    public function owner()
    {
        return $this->hasManyThrough('App\model\Owner', 'App\model\Audition', 'owner', 'id','audition_id');
    }
    public function city()
    {
        return $this->hasManyThrough('App\model\City', 'App\model\Audition', 'city', 'id','audition_id');
    }
    public function baseReader()
    {
        return $this->hasMany('App\model\BaseReader','id_book');
    }

    public function auditions()
    {
        return $this->hasMany('App\model\Audition','owner');
    }

}
