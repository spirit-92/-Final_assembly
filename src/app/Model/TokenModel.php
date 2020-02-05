<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TokenModel extends Model
{
    protected $table = 'token';
    protected $fillable = ['user_id','token'];
    public $timestamps = false;
}
