<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slots extends Model
{
    protected $table = 'slots';

    protected $fillable = [
    	'char_id',
	    'slot1',
	    'slot2',
	    'slot3',
	    'slot4',
	    'slot5',
	    'slot6',
    ];

    public function char()
    {
    	return $this->belongsTo('App\Chars');
    }
}
