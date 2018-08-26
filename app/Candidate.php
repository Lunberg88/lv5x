<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    /**
     * @var string
     */
    protected $table = "candidate";

    /**
     * @var array
     */
    protected $fillable = [
        'fio',
        'email',
        'stack',
        'tags',
        'salary',
        'status',
        'viewed',
        'cvs',
        'subscribe',
        'upload_cvs',
        'custom_info',
        'user_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    /**
     * @param $key
     * @return null
     */
    public function searchCandidateByDetails($key)
    {
        return $key !== null ? $this->where('stack', 'LIKE', '%'.$key.'%')->orWhere('tags', 'LIKE', '%'.$key.'%')->orWhere('salary', 'LIKE', '%'.$key.'%')->get() : null;
    }

    /**
     * @param $number
     * @return mixed
     */
    public function getCandidateByQnt($number)
    {
        return $this->paginate((int)$number);
    }

    /**
     * @return mixed
     */
    public function getUnviewedCandidates()
    {
        return $this->where('viewed', '=', '0')->get();
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getUserSubscribe($email)
    {
        return $this->where('email', $email)->pluck('subscribe')->first();
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    /**
     * @param $limit
     * @return mixed
     */
    public function getLatestByLimit($limit)
    {
        return $this->paginate((int)$limit);
    }
}
