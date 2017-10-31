<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objects extends Model
{
    protected $table = 'objects';

    protected $fillable = [
    	'name',
	    'dur_min',
	    'dur_max',
	    'img',
	    'strength',
	    'dexterity',
	    'intuition',
	    'stamina',
	    'intelect',
	    'mana',
	    'axe_master',
	    'knife_master',
	    'staff_master',
	    'sword_master',
	    'bow_master',
	    'stick_master',
	    'fire_master',
	    'water_master',
	    'earth_master',
	    'air_master',
	    'min_hit',
	    'max_hit',
	    'ar_head',
	    'ar_chest',
	    'ar_belt',
	    'ar_foots',
	    'ar_fire',
	    'ar_water',
	    'ar_earth',
	    'ar_air',
	    'power',
	    'magic_power',
	    'critical_hit',
	    'dodge',
	    'magic_critical',
    ];

    public $timestamps = false;

    public function chars()
    {
    	return $this->belongsToMany('App\Bag');
    }

    public function charbag()
    {
    	return $this->belongsTo('App\Charbag');
    }
}
