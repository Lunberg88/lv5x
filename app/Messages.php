<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    /**
     * @var array
     */
    protected $fillable = ["name", "email", "message", "viewed"];

    /**
     * @return mixed
     */
    public function getUnviewedMessages()
    {
        return $this->where('viewed', '=', '0')->get();
    }

    /**
     * @param $limit
     * @return mixed
     */
    public function getLatestByLimit($limit)
    {
        return $this->paginate((int)$limit);
    }

    public function sendMessage($data)
    {

    }
}
