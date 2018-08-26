<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFavs extends Model
{
	protected $table = "userfavs";

    protected $fillable = ['user_id', 'opening_id'];

    public $timestamps = false;
}
