<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = "candidate";
    protected $fillable = ['fio', 'email', 'stack', 'tags', 'salary'];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
