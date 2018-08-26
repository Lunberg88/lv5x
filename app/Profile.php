<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = "profile";
    protected $fillable = ['candidate_id', 'info'];
    public $timestamps = false;

    public function candidate()
    {
        return $this->belongsTo('App\Candidate', 'id', 'candidate_id');
    }
}
