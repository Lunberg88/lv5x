<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = "group";

    protected $fillable = ["owner_id", "title", "about"];

    public $timestamps = false;

    public function user()
    {
    	$this->belongsTo('App\User');
    }
}
