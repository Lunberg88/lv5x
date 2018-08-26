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

    /**
     * @param $user_id
     * @param $opening_id
     * @return mixed
     */
    public function getUserOpening($user_id, $opening_id)
    {
        return $this->where([['user_id', '=', (int)$user_id], ['opening_id', '=', (int)$opening_id]])->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getAllAppliedOpeningById($id)
    {
        return $this->where('opening_id', '=', $id)->get();
    }
}
