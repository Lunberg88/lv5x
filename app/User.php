<?php

namespace App;

use App\Http\Requests\AdminProfileRequest;
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function candidates()
    {
        return $this->belongsTo('App\Candidate');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function group()
    {
    	return $this->hasMany('App\Group','owner_id', 'id');
    }

    /**
     * @return bool
     */
	public function isAdmin()
	{
		return $this->admin ? true : false; // this looks for an admin column in your users table
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function userfavs()
    {
        return $this->belongsToMany('App\Openings','userfavs','user_id', 'opening_id','user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function openings()
    {
        return $this->hasMany('App\CandidateToOpening');
    }

    /**
     * Model custom methods
     */

    /**
     * @param $id
     * @return mixed
     */
    public function getCurrentUserId($id)
    {
        return $this->find((int)$id);
    }

    /**
     * @param AdminProfileRequest $adminProfileRequest
     * @param $admin_id
     */
    public function updateAdminProfile(AdminProfileRequest $adminProfileRequest, $admin_id)
    {
        if($adminProfileRequest->validated()) {
            $adminProfileRequest->new_password = bcrypt($adminProfileRequest->new_password);
            $profile = $this->find((int)$admin_id);
            $profile->update($adminProfileRequest->except('_token'));
            if($adminProfileRequest->hasFile('edit_upload_avatar')) {
                if($profile->avatar !== null) {
                    $path = 'images/avatars/'.$profile->avatar;
                    if(file_exists($path))
                    {
                        if(!is_dir(unlink($path)));
                    }
                }

                $profile->update(['avatar' => uniqid().'.'.$adminProfileRequest->file('edit_upload_avatar')->getClientOriginalExtension()]);
                $adminProfileRequest->file('edit_upload_avatar')->move('images/avatars/', $profile->avatar);
            }
            if($adminProfileRequest->old_password != null && $adminProfileRequest->new_password != null) {
                if($adminProfileRequest->old_password == $profile->password) {
                    $profile->update(['password' => $adminProfileRequest->new_password]);
                }
            }
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getAllNotifications($id)
    {
        $user = $this->find((int)$id);
        return $user->unreadNotifications;
    }
}
