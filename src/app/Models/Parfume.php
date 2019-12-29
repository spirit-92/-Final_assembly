<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parfume extends Model
{
    protected $table = 'parfume';
    protected $connection = 'main_db';
    protected $fillable = ['name'];
    public $timestamps = true;
}
