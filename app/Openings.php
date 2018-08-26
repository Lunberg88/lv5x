<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Openings extends Model
{
    /**
     * @var string
     */
    protected $table = "openings";

    /**
     * @var array
     */
    protected $fillable = [
    	'title',
        'slug',
        'img',
	    'location',
	    'salary',
	    'type',
        'rate',
	    'description',
	    'status',
    ];

    /**
     * @return mixed
     */
    public function getLastOpenings()
    {
        return $this->orderByDesc('id')->paginate(16);
    }

    /**
     * @param $limit
     * @return mixed
     */
    public function getLatestOpeningsByLimit($limit)
    {
        return $this->latest()->take((int)$limit)->get();
    }

    /**
     * @param $limit
     * @return mixed
     */
    public function getOpeningsByLimit($limit)
    {
        return $this->orderByDesc('id')->paginate((int)$limit);
    }

    /**
     * @param $user_id
     * @param $opening_id
     * @return mixed
     */
    public function getCandidatesToOpening($user_id, $opening_id)
    {
        return (CandidateToOpening::where([['user_id', '=', (int)$user_id], ['opening_id', '=', (int)$opening_id]])->first())->delete();
    }

    /**
     * @param $type
     * @param $limit
     * @param string $column
     * @return mixed
     */
    public function sortByTypeWithLimit($type, $limit, $column = 'type')
    {
        return $this->where($column,'=', $type)->orderByDesc('id')->paginate((int)$limit);
    }

    /**
     * @param $type
     * @return mixed
     */
    public function sortByType($type)
    {
        return $this->where('type', '=', $type)->get();
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug)
    {
        return $this->where('slug', '=', $slug)->first();
    }

    /**
     * @param $id
     * @param $limit
     * @return mixed
     */
    public function getRelatedOpeningsByParams($id, $limit)
    {
        return $this->where([['status', '>', '0'], ['id', '!=', $id]])->latest()->take((int)$limit)->get();
    }
}
