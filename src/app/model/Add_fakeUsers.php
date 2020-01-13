<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Add_fakeUsers extends Model
{
    protected $table = 'fake_users';
    protected $connection = 'mysql';
    protected $fillable = ['username','img','date_birth','gender','country','city','about_user','created_at','updated_at'];
    public $timestamps = true;
}
