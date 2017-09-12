<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = "candidate";
    protected $fillable = ['fio', 'email', 'stack', 'tags', 'salary'];

    public function profile()
    {
        return $this->hasOne('App\Profile', 'candidate_id', 'id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'user_id', 'id');
    }
}
