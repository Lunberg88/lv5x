<?php

namespace App\Traits;

use App\CandidateToOpening;
use Exception;
use App\Messages;
use App\Candidate;

trait CandidatesHelper
{
    /**
     * @var array
     */
   public static $stack = [
        1 => 'Frontend',
        2 => 'Backend',
        3 => 'FullStack',
        4 => 'Mobile',
        5 => 'Design',
        6 => 'Traders',
        7 => 'DevOps',
        8 => 'Project Manager',
        9 => 'Product Manager',
        10 => 'Sales Manager',
        11 => 'CTO'
    ];

    /**
     * @var array
     */
   public static $currencies = [
       1 => '&dollar;',
       2 => '&euro;',
       3 => '&#8381;',
       4 => '&#8372;'
   ];

    /**
     * @param $value
     * @param $type
     * @return Exception
     */
   public static function convertTypes($value, $type)
    {
        if($type === 'stack') {
            if(array_key_exists($value, self::$stack)) {
                return self::$stack[$value];
            }
            return new Exception('Stack value doesn\'t set in db');
        }

        if($type === 'currency') {
            if(array_key_exists($value, self::$currencies)) {
                return self::$currencies[$value];
            }
            return new Exception('Passed currency type doesn\'t found');
        }
        return new Exception('Type or value doesn\'t passed');
    }

    /**
     * @return array
     */
    public static function showRegisterStack()
    {
        return self::$stack;
    }

    /**
     * @param null $type
     * @return int|string
     */
    public static function showNewNotif($type = null)
    {
        if($type == 'msg') {
            $newMsg = Messages::where('viewed', '=', '0')->get();
            $newMsg == $newMsg->isEmpty() ? false : count($newMsg);
            return count($newMsg);

        } elseif($type == 'candidates') {
            $newCandidates = Candidate::where('viewed', '=', '0')->get();
            $newCandidates == $newCandidates->isEmpty() ? false : count($newCandidates);
            return count($newCandidates);

        }
        return 'none';
    }

    /**
     * @param null $id
     * @param null $type
     * @return array|bool|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function showAppliedOpenings($id = null, $type = null)
    {
        if($type === null) {
            if($id !== null) {
                return CandidateToOpening::where('opening_id', '=', $id)->get();
            }
        } elseif($type == 1) {
            $applieds = [];
            $allCandidates = CandidateToOpening::where('opening_id', '=', $id)->get();
            foreach($allCandidates as $users) {
                $user = Candidate::findOrFail($users->user_id);
                array_push($applieds, $user);
            }
            return $applieds;
        }
        return false;
    }
}