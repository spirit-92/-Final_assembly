<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Audition extends Model
{
    protected $table = 'auditions';
    public function ownerName()
    {

        return $this->hasOne('App\model\Owner','id','owner');
    }


}
