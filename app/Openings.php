<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Openings extends Model
{
    protected $table = "openings";

    protected $fillable = [
    	'title',
	    'location',
	    'salary',
	    'description',
	    'status',
    ];
}
