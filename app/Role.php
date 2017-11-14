<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "role";
    public $timestamps = false;

    public function users()
    {
        $this->hasMany('App\User', 'role_user', 'user_id', 'role_id');
    }
}
