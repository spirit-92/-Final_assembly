<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class AddParfume extends Model
{
    protected $table = 'userAdd';
    protected $connection = 'mysql';
    protected $fillable = ['name','slug','description','big_img','small_img','category'];
    public $timestamps = false;
}
