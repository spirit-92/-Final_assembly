<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parfume extends Model
{
    protected $table = 'parfume';
    protected $connection = 'mysql';
    protected $fillable = ['name'];
    public $timestamps = false;
}
