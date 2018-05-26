<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Openings extends Model
{
    protected $table = "openings";

    protected $fillable = [
    	'title',
        'slug',
	    'location',
	    'salary',
	    'type',
	    'description',
	    'status',
    ];
}
