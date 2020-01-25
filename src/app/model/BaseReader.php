<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class BaseReader extends Model
{
    protected $table = 'baseReader';
    public function reader()
    {
        return $this->hasOne('App\model\Reader','id','id_reader');
    }

}
