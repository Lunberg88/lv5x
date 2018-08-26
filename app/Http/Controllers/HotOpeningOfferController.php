<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;

class HotOpeningOfferController extends Controller
{
    public function index()
    {
        return view('admin.opening_offer.main');
    }

    public function sendMail(Request $request)
    {
        $recipients = [];
        $all_skills = explode(',', trim($request->skills));
        foreach($all_skills as $skill) {
            $recipient_all = Candidate::where('tags', 'LIKE', '%'.$skill.'%')->pluck('email', 'id')->all();
            echo "<pre>".print_r($recipient_all,1)."</pre>"; die();
            //if(!$recipient_all->isEmpty()) {
                foreach($recipient_all as $recipient) {
                    /*if(!in_array($recipient->email, $recipients)) {
                        array_push($recipients, $recipient);
                    }*/
                   $res[] = $this->iterateArray($recipients, $recipient->email);
                }
            //}
        }
        //return view('admin.opening_offer.main');
        //foreach($recipients as $r) {
        //    echo "<b>".$r->email."</b> [".$r->id."]<br>";
        //}

        echo "<pre>".print_r($recipients,1)."</pre>";
        //echo "<pre>".print_r($res,1)."</pre>";
    }

    /**
     * @param array $array
     * @param string $value
     * @return array
     */
    public function iterateArray(array $array, string $value)
    {
        if(!count($array) < 0) {
            for($i=0; $i<count($array); ++$i) {
                if(is_array($array)) {
                    if(!in_array($value, $array[$i])) {
                        array_push($array, $value);
                    }
                }
            }
        }

        return $array;
    }
}
