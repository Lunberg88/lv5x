<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateToOpening extends Model
{
    /**
     * @var string
     */
    protected $table = "candidate_to_openings";

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'opening_id'];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function opening()
    {
        return $this->belongsTo('App\Openings');
    }
}
