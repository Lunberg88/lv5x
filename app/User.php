<?php

namespace App;

use App\History;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function candidates()
    {
        return $this->belongsTo('App\Candidate');
    }

    public function group()
    {
    	return $this->hasMany('App\Group','owner_id', 'id');
    }

	public function isAdmin()
	{
		return $this->admin ? true : false; // this looks for an admin column in your users table
	}
}
