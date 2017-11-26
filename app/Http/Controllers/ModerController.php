<?php

namespace App\Http\Controllers;

use Auth;
use App\Candidate;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ModerController extends Controller
{
    public function index()
    {
        return view('layouts.app');
    }

    public function create()
    {
        return view('posts.add');
    }

    public function store(Request $request)
    {
    	//$my = $request->only('fio', 'email', 'salary', 'upload');
        $load = $request->file('upload')->store('doc');
        //echo "<pre>".print_r($my,1)."</pre>"; exit();

        $candidate = new Candidate();
        $candidate->fio = $request->fio;
        $candidate->email = $request->email;
        $candidate->stack = $request->stack;
        $candidate->tags = $request->tags;
        $candidate->salary = $request->salary;
        $candidate->user_id = Auth::id();
        $candidate->save();

        $profile = new Profile();
        $profile->candidate_id = $candidate->id;
        $profile->info = $load;
        $profile->save();

        return Redirect::route('index.moder.index');
    }

    public function add(Request $request)
    {
    	$load = $request->file('upload');
    	$x = $load->getClientMimeType();


    	echo "<pre>".print_r($x,1)."</pre>"; die();

    }

    public function show_id(Request $request, $id)
    {
        //$candidate = Candidate::where('id', '=', $id)->leftJoin('profile', 'profile.candidate_id', '=', 'candidate.id');
        $cc = DB::table('candidate')
            ->where('candidate.id', '=', $id)
            ->join('profile', 'candidate.id', '=', 'profile.candidate_id')
            ->get();

        foreach($cc as $c) {
           $cv_name = $c->info;
        }
        $cv = [];
        $cv[] = Storage::get($cv_name);

        $pdf = base64_encode(file_get_contents('http://localhost/ajax_lv/storage/app/'.$cv_name));
        $npdf = base64_decode($pdf);
        return response()->json(['npdf' => $npdf]);

        echo "<pre>".print_r($cv,1)."</pre>"; exit();


        return view('posts.show', ['cc' => $cc, 'cv' => $cv]);
    }

}
