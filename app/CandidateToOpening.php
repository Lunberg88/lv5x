<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateToOpening extends Model
{
    protected $table = "candidate_to_openings";

    protected $fillable = ['user_id', 'opening_id'];

    public $timestamps = false;
}
