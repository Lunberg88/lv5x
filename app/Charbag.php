<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charbag extends Model
{
    protected $table = 'charbag';

    protected $fillable = [
	    'char_id',
	    'obj_id',
    ];

    public $timestamps = false;

    public function objects()
    {
    	return $this->hasMany('App\Objects','id','obj_id');
    }
}