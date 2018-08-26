<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'actions', 'type'];

    /**
     * @param $limit
     * @return mixed
     */
    public function getLatestByLimit($limit)
    {
        return $this->orderBy('id', 'DESC')->paginate((int)$limit);
    }
}
