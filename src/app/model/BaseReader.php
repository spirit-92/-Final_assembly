<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class BaseReader extends Model
{
    protected $table = 'baseReader';
    protected $fillable = ['id_reader','id_book','id_rate'];
    public $timestamps = false;

    public function reader()
    {
        return $this->hasOne('App\model\Reader','id','id_reader');
    }

}
